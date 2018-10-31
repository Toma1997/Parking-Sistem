             
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
                    
                    if(!preg_match("/^^(?=[^\d]*\d)(?=[A-Z\d ]*[^A-Z\d ]).{8,}$/", $password)){
                        $greske[] = "<h5>Lozinka nije validna !</h5>";
                    }

                    if(count($greske)){
                        $greske = implode("", $greske);
                        echo $greske;
                    } else{

                        include("./kernel/database_wrapper.php");
                        $db = new Database("parking");
                        $db->proveriKorisnika($_POST);

                        if($db->getResult()){
                            header("Location: ./index.php?stranica=");
                        }
                    }

                }

            ?>
            </div>
        </form>
    </div>
</div>

<!-- Proveriti za oninvalid ne radi kako treba
 oninvalid="this.setCustomValidity('Popunite polje')">