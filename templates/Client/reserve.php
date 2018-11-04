<?php

 if (!empty($_GET)) {
        extract($_GET);
 }
                

$uspesno = '';

if (!empty($_POST)) {
    extract($_POST);
    $poruke = array();
    
    if(!preg_match("/^[A-Z]{2}\-[0-9]{3,5}\-[A-Z]{2}$/", $registration)){
        $poruke[] = "<h5>Registracija nije validna !</h5>";
    }

    if(!preg_match("/^[0-4]$/", $floor)){
        $poruke[] = "<h5>Nije izabran adekvatan sprat !</h5>";
    }

    if(!preg_match("/^[A|B|C|D]1?[1-9]$/", $sector) || $sector > 12){
        $poruke[] = "<h5>Nije izabran adekvatan sektor !</h5>";
    }

    if(!preg_match("/^1?[0-9]$/", $place)){
        $poruke[] = "<h5>Nije izabrano adekvatno mesto !</h5>";
    }

    if(count($poruke)){
        $poruke = implode("", $poruke);
    } else{

        include("./kernel/database_wrapper.php");
        $db = new Database("parking");
        $db->Connect();
        $db->unesiRegistraciju($registration, $_SESSION['CLIENT']);
        
        if($db->getResult()){

            $db->rezervisiMesto($registration, $floor, $sector, $place);
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
				<input type="text" id="registration" name="registration" class="form-control" required placeholder="Primer: BG-345-ZY">
			</div>			
            <div class="form-group">
                <label for="floor">Sprat:</label>
                <input type="text" id="floor" name="floor" class="form-control" required placeholder="Primer: 2" value="<?php echo $floor ?? ''?>">
            </div>
            <div class="form-group">
                <label for="sector">Sektor:</label>
                <input type="text" id="sector" name="sector" class="form-control" required placeholder="Primer: C3" value="<?php echo $sector ?? ''?>">
            </div>
            <div class="form-group">
                <label for="place">Mesto:</label>
                <input type="text" id="place" name="place" class="form-control" required placeholder="Primer: 7" value="<?php echo $place ?? ''?>">
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

