<?php

if (!empty($_POST)) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $greske = array();

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $greske[] = $jezici_error['email']; 
    }
    
    if(!preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/", $password)){
        $greske[] = $jezici_error['pass'];
    }

    if(count($greske)){
        $greske = implode("", $greske);
    } else{

        include("./core/database_wrapper.php");
        $db = new Database("parking");
        $db->Connect();
        $db->proveriKorisnika("email", "password_hash", $email, sha1($password), 'AND');
        if($db->getResult()){

            $db->jeAdmin($email);
            if($db->getResult()){
                $_SESSION['ADMIN'] = $email;
                setcookie('jezik', 'srpski_latinica');
            }else {
				$db->__destruct();
				$_SESSION['CLIENT'] = $email;
			}
            header("Location: ?stranica=");
        } else {
            $greske = $jezici_error['login'];
        }
    }

}

?>

     
<div>
    <h1><?php echo $jezici_mapa['loginPage'][0];?></h1>
    <div class="content">
        <form method="post">
            <div class="form-group">
                <label for="email"><?php echo $jezici_mapa['loginPage'][1];?></label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="<?php echo $jezici_mapa['loginPage'][2];?>" value="<?php echo $_POST['email'] ?? '';?>"> 
            </div>
            <div class="form-group">
                <label for="password"><?php echo $jezici_mapa['loginPage'][3];?></label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="<?php echo $jezici_mapa['loginPage'][4];?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                   <?php echo $jezici_mapa['loginPage'][5];?>
                </button>
            </div>
            <div class="form-group">
            <?php echo $greske ?? ''; ?>
            </div>
        </form>
    </div>
</div>