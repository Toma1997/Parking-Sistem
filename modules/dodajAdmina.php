<?php
if (!empty($_POST)) {

    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $code = $_POST['code'];

    $poruke = array();
                
    if(!preg_match("/^[A-Z][a-zA-Z']+$/", $forename)){
        $poruke[] = "<h5>Ime nije validno !</h5>";
    }
                
    if(!preg_match("/^[A-Z][a-zA-Z']+$/", $surname)){
        $poruke[] = "<h5>Prezime nije validno !</h5>";
    }
                
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $poruke[] = "<h5>Email nije validan !</h5>";
    }
                
    if(!preg_match("/^06[0-9]\-[0-9]{3,4}\-[0-9]{3,4}$/", $telephone)){
        $poruke[] = "<h5>Telefon nije validan !</h5>";
    }
                    
    if(!preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/", $password1)){
        $poruke[] = "<h5>Lozinka nije validna !</h5>";
    } else {
        if($password1 !== $password2){
            $poruke[] = "<h5>Nije uspesno potvrdjena lozinka !</h5>";
        }
    }
					
    //CAPTCHA validacija 
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Parking-Sistem/securimage/securimage.php';
    $securimage = new Securimage();
                                    
    if (!empty($code) && !$securimage->check((string)$code)) {
        $poruke[] = "<h5>Uneseni kod se ne poklapa sa onim sa slike !</h5>";
    }

    if(count($poruke)){
        $poruke = implode("", $poruke);
    } else{

        include("./core/database_wrapper.php");
        $db = new Database("parking");
        $db->Connect();
        $db->proveriKorisnika("email", "telephone", $email, $telephone, 'OR');

        if($db->getResult()){
            $poruke = "<h3>Korisnik je vec registrovan !</h3>";
        } else {
            $db->dodajKorisnika('', $forename, $surname, $email, $telephone, $password1, '1');

            if(!$db->getResult()){
                $db->__destruct();
                $poruke = "<h3> Greska pri validaciji forme !</h3>";
                                
            } else{
                $poruke = "<h3> Uspesno dodat admin !</h3>";
            }
        }                        
    }
}
?>
<div>
    <h1>Dodaj Admina</h1>
    <div class="content">
            <form method="post">
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
                        Registruj Admina
                    </button>
                </div>
            </form>

            <div class="form-group">
            <?php echo $poruke ?? '';?>
            </div>
    </div>
</div>

