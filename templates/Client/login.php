             
<div>
    <h1>Prijava korisnika</h1>
    <div class="content">
        <form method="post">
            <div class="form-group">
                <label for="email">Adresa e-pošte:</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Unesite adresu e-pošte"> 
            </div>
            <div class="form-group">
                <label for="password">Lozinka:</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Unesite lozinku">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Prijavite se
                </button>
            </div>
            <div class="form-group">
            <?php

                if ($_POST) {
                    extract($_POST);
                    $greske = array();

                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $greske[] = "<h5>Email nije validan !</h5>";
                    }
                    
                    if(!preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/", $password)){
                        $greske[] = "<h5>Lozinka nije validna !</h5>";
                    }

                    if(count($greske)){
                        $greske = implode("", $greske);
                        echo $greske;
                    } else{

                        include("./kernel/database_wrapper.php");
                        $db = new Database("parking");
                        $db->Connect();
                        $db->proveriKorisnika("email", "password_hash", $_POST['email'], sha1($_POST['password']));

                        if($db->getResult()){
                            $db->__destruct();
                            //session_start();
                            $_SESSION['CLIENT'] = $email;
                            header("Location: ./index.php?stranica=");
                        } else {
                            echo "<h5> Neispravno logovanje !</h5>";
                        }
                    }

                }

            ?>
            </div>
        </form>
    </div>
</div>