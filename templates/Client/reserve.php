<?php
                
if (!empty($_POST)) {
    $registration = $_POST['registration'];
    $floor = $_POST['floor'];
    $sector = $_POST['sector'];
    $place = $_POST['place'];
    $datetime = $_POST['datetime'];

    $poruke = array();
    
    if(!preg_match("/^[A-Z]{2}\-[0-9]{3,5}\-[A-Z]{2}$/", $registration)){
        $poruke[] = "<h5>Registracija nije validna !</h5>";
    }

    if(!preg_match("/^[0-3]$/", $floor)){
        $poruke[] = "<h5>Nije izabran adekvatan sprat !</h5>";
    }

    if(!preg_match("/^[A|B|C|D](1[0-2]|[1-9])$/", $sector) || $sector > 12){
        $poruke[] = "<h5>Nije izabran adekvatan sektor !</h5>";
    }

    if(!preg_match("/^(1[0-2]|[1-9])$/", $place)){
        $poruke[] = "<h5>Nije izabrano adekvatno mesto !</h5>";
    }

    if(!preg_match("/^20[0-9]{2}\-(0[1-9]|1[0-2])\-(0[1-9]|[12][0-9]|3[01])\s([01][0-9]|2[0-3])\:([0-5][0-9])$/", $datetime)){
        $poruke[] = "<h5>Datum i vreme nisu u dobrom formatu !</h5>";
    } else {
        // dodatna provera da datum i vreme nisu iz proslosti, naknadno ce se uraditi
    }

    if(count($poruke)){
        $poruke = implode("", $poruke);
    } else{

        include("./kernel/database_wrapper.php");
        $db = new Database("parking");
        $db->Connect();
        $db->unesiRegistraciju($registration, $_SESSION['CLIENT']);
        
        if($db->getResult()){

            $db->rezervisiMesto($registration, $floor, $sector, $place, $datetime);
            if(!$db->getResult()){
                $poruke = "<h5> Mesto nije slobodno, pogledajte mapu sa slobodnim mestima !</h5>";
            } else {
                $poruke = '<h5> Uspesno rezervisano mesto !</h5>';
            }

        } else {
            $poruke = "<h5> Doslo je do greske u registraciji vozila, probajte ponovo !</h5>";
        }
    }

}


?>

<div>
    <h1>Rezervacija mesta</h1>
    <div class="content">
        <form method="post">
			<div class="form-group">
				<label for="registration">Registracija:</label>
				<input type="text" id="registration" name="registration" class="form-control" required placeholder="Primer: BG-345-ZY" value="<?php echo $_POST['registration'] ?? ''?>">
			</div>		
            <div class="form-group">
                <label for="floor">Sprat:</label>
                <input type="text" id="floor" name="floor" class="form-control" required placeholder="Primer: 2" value="<?php echo $_GET['floor'] ?? ''?>">
            </div>
            <div class="form-group">
                <label for="sector">Sektor:</label>
                <input type="text" id="sector" name="sector" class="form-control" required placeholder="Primer: C3" value="<?php echo $_GET['sector'] ?? ''?>">
            </div>
            <div class="form-group">
                <label for="place">Mesto:</label>
                <input type="text" id="place" name="place" class="form-control" required placeholder="Primer: 7" value="<?php echo $_GET['place'] ?? ''?>">
            </div>
            <div class="form-group">
                <label for="floor">Datum i vreme pocetka boravka:</label>
                <input type="text" id="datetime" name="datetime" class="form-control" required placeholder="Primer: 2018-05-20 14:05" value="<?php echo $_POST['datetime'] ?? ''?>">
            </div>
			<div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Rezervacija
                </button>
            </div>

            <div class="form-group"><?php echo $poruke ?? '';?></div>
        </form>
    </div>
</div>

