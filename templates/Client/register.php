<?php
                if ($_POST) {
                    extract($_POST);
                    $greske = array();
                
                    if(!preg_match("/^[A-Z][a-zA-Z']+$/", $forename)){
                        $greske[] = "<h5>Ime nije validno !</h5>";
                    }
                
                    if(!preg_match("/^[A-Z][a-zA-Z']+$/", $surname)){
                        $greske[] = "<h5>Prezime nije validno !</h5>";
                    }
                
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $greske[] = "<h5>Email nije validan !</h5>";
                    }
                
                    if(!preg_match("/^06[0-9]\-[0-9]{3,4}\-[0-9]{3,4}$/", $telephone)){
                        $greske[] = "<h5>Telefon nije validan !</h5>";
                    }
                    
                    if(!preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/", $password1)){
                        $greske[] = "<h5>Lozinka nije validna !</h5>";
                    } else {
                        if($password1 !== $password2){
                            $greske[] = "<h5>Nije uspesno potvrdjena lozinka !</h5>";
                        }
                    }
					
                    //CAPTCHA validacija 
                    include_once $_SERVER['DOCUMENT_ROOT'] . '/Parking-Sistem/securimage/securimage.php';
                    $securimage = new Securimage();
                                    
                    if (isset($_POST['code']) && !$securimage->check((string)$_POST['code'])) {
                        $greske[] = "<h5>Uneseni kod se ne poklapa sa onim sa slike !</h5>";
                    }

                    if(count($greske)){
                        $greske = implode("", $greske);
                    } else{

                        include("./kernel/database_wrapper.php");
                        $db = new Database("parking");
                        $db->Connect();
                        $db->proveriKorisnika("email", "telephone", $_POST['email'], $_POST['telephone']);

                        if($db->getResult()){
                            $greske = "<h3>Vec ste registrovani !</h3>";
                            header("Location: index.php?stranica=login");
                        } else {
                            $db->dodajKorisnika($_POST);

                            if(!$db->getResult()){
                                $db->__destruct();
                                $greske = "<h3> Greska pri validaciji forme !</h3>";
                                
                            } else{
                                header("Location: index.php?stranica=login");
                            }
                        }                        
                    }
                }

            ?>
<div>
    <h1>Registracija korisnika</h1>
    <div class="content">
            <form method="post">
				<div class="form-group">
                    <label for="client_type">Tip lica:</label>
					<div class="custom-control custom-radio">
					  <input type="radio" class="custom-control-input" id="individual" value="individual" name="client_type" checked>
					  <label class="custom-control-label" for="individual">Fizičko lice</label>
					</div>
					<div class="custom-control custom-radio">
					  <input type="radio" class="custom-control-input" id ="business" value="business" name="client_type">
					  <label class="custom-control-label" for="business">Pravno lice</label>
					</div>
                </div>
                <div class="form-group">
                    <input type="text" id="forename" name="forename" class="form-control" value="<?php echo $_POST['forename'] ?? '';?>" required placeholder="Unesite ime ">
                </div>
                <div class="form-group">
                    <input type="text" id="surname" name="surname" class="form-control" value="<?php echo $_POST['surname'] ?? '';?>" required placeholder="Unesite prezime">
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $_POST['email'] ?? '';?>"  required placeholder="Unesite adresu e-pošte">					
                </div>
                <div class="form-group">
					<label class="font-weight-light" for="telephone">Broj telefona mora da ima šablon: 063-111-888(8)</label>
                    <input type="text" id="telephone" name="telephone" class="form-control" value="<?php echo $_POST['telephone'] ?? '';?>" required placeholder="Unesite broj telefona">
                </div>
				<div class="form-group">
					<label class="font-weight-light" for="telephone">Lozinka mora imati minimum: 8 karaktera od toga jedno malo slovo, jedno veliko, specijalni znak i broj.</label>
                    <input type="password" id="password1" name="password1" class="form-control" required placeholder="Unesite lozinku">
                </div>
                <div class="form-group">
                    <input type="password" id="password2" name="password2" class="form-control" required placeholder="Unesite ponovo lozinku">
                </div>
				<div class="form-group">
					<img id="captcha" class="col-sm-4 img-fluid" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
					<input type="text" id="captcha_code" name="code" class="form-control" size="10" placeholder="Unesite kod sa slike" maxlength="6" required />			
				</div>
				
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Registrujte se
                    </button>
                </div>
            </form>

            <div class="form-group">
            <?php echo $greske ?? '';?>
            </div>
    </div>
</div>

