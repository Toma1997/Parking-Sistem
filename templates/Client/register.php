
<div>
    <h1>Registracija korisnika</h1>
    <div class="content">
        <!-- < ?php if (!$Context->get('hideForm')): ?>-->
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
					<!--<label class="font-weight-light for="forename">Ime:</label>-->
                    <input type="text" id="forename" name="forename" class="form-control" value="<?php echo $forename ?? '';?>" required placeholder="Unesite ime ">
                </div>
                <div class="form-group">
                    <!--<label class="font-weight-light for="surname">Prezime:</label>-->
                    <input type="text" id="surname" name="surname" class="form-control" value="<?php echo $surname ?? '';?>" required placeholder="Unesite prezime">
                </div>
                <div class="form-group">
                    <!--<label for="email">Adresa e-pošte:</label>-->
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $email ?? '';?>"  required placeholder="Unesite adresu e-pošte">					
                </div>
                <div class="form-group">
					<label class="font-weight-light" for="telephone">Broj telefona mora da ima šablon: 063-111-888(8)</label>
                    <!--<label for="telephone">Broj telefona:</label>-->
                    <input type="text" id="telephone" name="telephone" class="form-control" value="<?php echo $telephone ?? '';?>" required placeholder="Unesite broj telefona">
                </div>
				<!-- Proveri da li nam treba bolje, mozda samo kao brojac
				<div class="form-group">
                    <label for="car">Broj vozila:</label>
					<input type="number" id="car" name="car"  class="form-control" required min="1" max="10" value="1">
                </div>-->
				<!--<div class="form-group">
					<label for="registration">Registracija:</label>
					<textarea class="form-control" rows="5" maxlength="9" id="registration" name="registration " required placeholder="Unesite broj ili brojeve registarske tablice"></textarea>
					<label class="font-weight-light" for="telephone">Unesite jednu ili više registarskih tablica šablona: BG111SD. Svaku u posebnom redu</label>
				</div>	-->
				<div class="form-group">
					<label class="font-weight-light" for="telephone">Lozinka mora imati minimum: 8 karaktera od toga jedno malo slovo, jedno veliko, specijalni znak i broj.</label>
                    <!--<label for="password1">Lozinka:</label>-->
                    <input type="password" id="password1" name="password1" class="form-control" required placeholder="Unesite lozinku">
                </div>
                <div class="form-group">
                    <!--<label for="password2">Ponovite lozinku:</label>-->
                    <input type="password" id="password2" name="password2" class="form-control" required placeholder="Unesite ponovo lozinku">
                </div>
				<div class="form-group">
					<img id="captcha" class="col-sm-4 img-fluid" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
					<input type="text" id="captcha_code" name="captcha_code" class="form-control" size="10" placeholder="Unesite kod sa slike" maxlength="6" required />
					
				</div>
				
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Registrujte se
                    </button>
                </div>
            </form>

            <div class="form-group">
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
                    
                    if(!preg_match("/^^(?=[^\d]*\d)(?=[A-Z\d ]*[^A-Z\d ]).{8,}$/", $password1)){
                        $greske[] = "<h5>Lozinka nije validna !</h5>";
                    } else {
                        if($password1 !== $password2){
                            $greske[] = "<h6>Nije uspesno potvrdjena lozinka !</h6>";
                        }
                    }

                    if(count($greske)){
                        $greske = implode("", $greske);
                        echo $greske;
                    } else{

                        include("./kernel/database_wrapper.php");
                        $db = new Database("parking");
                        $db->dodajKorisnika($_POST);

                        if($db->getResult()){
                            header("Location: ../index.php?stranica=login");
                        }
                    }

                }

            ?>
            </div>
        <!--< ?php endif; ?>
        <p>
            < ?php echo htmlspecialchars($Context->get('message')); ?>
        </p>-->
    </div>
</div>
<!-- Proveriti za oninvalid ne radi kako treba
 oninvalid="this.setCustomValidity('Popunite polje')">
