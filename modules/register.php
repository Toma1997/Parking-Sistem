<?php
if (!empty($_POST)) {

    $client_type = $_POST['client_type'];
    $forename = $_POST['forename'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $code = $_POST['code'];

    $greske = array();
                
    if(!preg_match("/^[A-Z][a-zA-Z']+$/", $forename)){
        $greske[] = $jezici_error['forename'];
    }
                
    if(!preg_match("/^[A-Z][a-zA-Z']+$/", $surname)){
        $greske[] = $jezici_error['surname'];
    }
                
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $greske[] = $jezici_error['email'];
    }
                
    if(!preg_match("/^06[0-9]\-[0-9]{3,4}\-[0-9]{3,4}$/", $telephone)){
        $greske[] = $jezici_error['telephone'];
    }
                    
    if(!preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/", $password1)){
        $greske[] = $jezici_error['pass'];
    } else {
        if($password1 !== $password2){
            $greske[] = $jezici_error['passCheck'];
        }
    }
					
    //CAPTCHA validacija 
    include_once './securimage/securimage.php';
    $securimage = new Securimage();
                                    
    if (!empty($code) && !$securimage->check((string)$code)) {
        $greske[] = $jezici_error['captcha'];
    }

    if(count($greske)){
        $greske = implode("", $greske);
    } else{

        include("./core/database_wrapper.php");
        $db = new Database("parking");
        $db->Connect();
        $db->proveriKorisnika("email", "telephone", $email, $telephone, 'OR');

        if($db->getResult()){
            $greske = $jezici_error['regCheck'];
            header("Location: index.php?stranica=login");
        } else {
            $db->dodajKorisnika($client_type, $forename, $surname, $email, $telephone, $password1, '0');

            if(!$db->getResult()){
                $db->__destruct();
                $greske = $jezici_error['form'];
                                
            } else{
                // kreiranje log fajla koji pamti podatke korisnika, samo za testiranje
                $file=fopen("korisnici.txt","a+");
                fwrite($file, "KORISNIK JE REGISTROVAN !\r\n");
                fwrite($file, "email:  " . $email . ", password: ".$password1."\r\n"); // \r\n znaci prelazak u novi red
                fwrite($file, "\r\n");
                fclose($file); // zatvara fajl

                $_SESSION['CLIENT'] = $email;
                header("Location: ?stranica=");
            }
        }                        
    }
}
?>
<div>
    <h1><?php echo $jezici_mapa['register'][0];?></h1>
    <div class="content">
            <form method="post">
				<div class="form-group">
                    <label for="client_type"><?php echo $jezici_mapa['register'][1];?></label>
					<div class="custom-control custom-radio">
					  <input type="radio" class="custom-control-input" id="individual" value="individual" name="client_type" checked>
					  <label class="custom-control-label" for="individual"><?php echo $jezici_mapa['register'][2];?></label>
					</div>
					<div class="custom-control custom-radio">
					  <input type="radio" class="custom-control-input" id ="business" value="business" name="client_type">
					  <label class="custom-control-label" for="business"><?php echo $jezici_mapa['register'][3];?></label>
					</div>
                </div>
                <div class="form-group">
                    <input type="text" id="forename" name="forename" class="form-control" value="<?php echo $_POST['forename'] ?? '';?>" required placeholder="<?php echo $jezici_mapa['register'][4];?>">
                </div>
                <div class="form-group">
                    <input type="text" id="surname" name="surname" class="form-control" value="<?php echo $_POST['surname'] ?? '';?>" required placeholder="<?php echo $jezici_mapa['register'][5];?>">
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $_POST['email'] ?? '';?>"  required placeholder="<?php echo $jezici_mapa['register'][6];?>">					
                </div>
                <div class="form-group">
					<label class="font-weight-light" for="telephone"><?php echo $jezici_mapa['register'][7];?></label>
                    <input type="text" id="telephone" name="telephone" class="form-control" value="<?php echo $_POST['telephone'] ?? '';?>" required placeholder="<?php echo $jezici_mapa['register'][8];?>">
                </div>
				<div class="form-group">
					<label class="font-weight-light" for="password1"><?php echo $jezici_mapa['register'][9];?></label>
                    <input type="password" id="password1" name="password1" class="form-control" required placeholder="<?php echo $jezici_mapa['register'][10];?>">
                </div>
                <div class="form-group">
                    <input type="password" id="password2" name="password2" class="form-control" required placeholder="<?php echo $jezici_mapa['register'][11];?>">
                </div>
				<div class="form-group">
					<img id="captcha" class="col-sm-4 img-fluid" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
					<input type="text" id="captcha_code" name="code" class="form-control" size="10" placeholder="<?php echo $jezici_mapa['register'][12];?>" maxlength="6" required />			
				</div>
				
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <?php echo $jezici_mapa['register'][13];?>
                    </button>
                </div>
            </form>

            <div class="form-group">
            <?php echo $greske ?? '';?>
            </div>
    </div>
</div>

