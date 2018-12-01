<?php
                
if (!empty($_POST)) {
    $registration = $_POST['registration'];
    $floor = $_POST['floor'];
    $sector = $_POST['sector'];
    $place = $_POST['place'];
    $datetime = $_POST['datetime'];

    $poruke = array();
    
    if(!preg_match("/^[A-Z]{2}\-[0-9]{3,5}\-[A-Z]{2}$/", $registration)){
        $poruke[] = $jezici_error['registration'];
    }

    if(!preg_match("/^[0-3]$/", $floor)){
        $poruke[] = $jezici_error['floor'];
    }

    if(!preg_match("/^[A|B|C|D](1[0-2]|[1-9])$/", $sector) || $sector > 12){
        $poruke[] = $jezici_error['sector'];
    }

    if(!preg_match("/^(1[0-2]|[1-9])$/", $place)){
        $poruke[] = $jezici_error['place'];
    }

    if(!preg_match("/^20[0-9]{2}\-(0[1-9]|1[0-2])\-(0[1-9]|[12][0-9]|3[01])\s([01][0-9]|2[0-3])\:([0-5][0-9])$/", $datetime)){
        $poruke[] = $jezici_error['date'];
    } else {
        // dodatna provera da datum i vreme nisu iz proslosti, naknadno ce se uraditi
    }

    if(count($poruke)){
        $poruke = implode("", $poruke);
    } else{

        include("./core/database_wrapper.php");
        $db = new Database("parking");
        $db->Connect();
        $db->unesiRegistraciju($registration, $_SESSION['CLIENT']);
        
        if($db->getResult()){

            $db->rezervisiMesto($registration, $floor, $sector, $place, $datetime);
            if(!$db->getResult()){
                $poruke = $jezici_error['reserved'];
            } else {
                $poruke = $jezici_error['success'];
            }

        } else {
            $poruke = $jezici_error['error'];
        }
    }

}


?>

<div>
	<?php echo $jezici_mapa['reserve'][0];?>
    <div class="content">
        <form method="post">
			<div class="form-group">
				<label for="registration"><?php echo $jezici_mapa['reserve'][1];?></label>
				<input type="text" id="registration" name="registration" class="form-control" required placeholder="<?php echo $jezici_mapa['reserve'][7];?>: BG-345-ZY" value="<?php echo $_POST['registration'] ?? ''?>">
			</div>		
            <div class="form-group">
                <label for="floor"><?php echo $jezici_mapa['reserve'][2];?></label>
                <input type="text" id="floor" name="floor" class="form-control" required placeholder="<?php echo $jezici_mapa['reserve'][7];?>: 2" value="<?php echo $_GET['floor'] ?? ''?>">
            </div>
            <div class="form-group">
                <label for="sector"><?php echo $jezici_mapa['reserve'][3];?></label>
                <input type="text" id="sector" name="sector" class="form-control" required placeholder="<?php echo $jezici_mapa['reserve'][7];?>: C3" value="<?php echo $_GET['sector'] ?? ''?>">
            </div>
            <div class="form-group">
                <label for="place"><?php echo $jezici_mapa['reserve'][4];?></label>
                <input type="text" id="place" name="place" class="form-control" required placeholder="<?php echo $jezici_mapa['reserve'][7];?>: 7" value="<?php echo $_GET['place'] ?? ''?>">
            </div>
            <div class="form-group">
                <label for="floor"><?php echo $jezici_mapa['reserve'][5];?></label>
                <input type="text" id="datetime" name="datetime" class="form-control" required placeholder="<?php echo $jezici_mapa['reserve'][7];?>: 2018-05-20 14:05" value="<?php echo $_POST['datetime'] ?? ''?>">
            </div>
			<div class="form-group">
                <button type="submit" class="btn btn-primary">
                   <?php echo $jezici_mapa['reserve'][6];?>
                </button>
            </div>

            <div class="form-group"><?php echo $poruke ?? '';?></div>
        </form>
    </div>
</div>

