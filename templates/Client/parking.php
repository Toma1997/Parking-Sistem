<?php 

$nivo = (int)$_GET['nivo'];

if($nivo < 0){
    $nivo = 0;
}

if($nivo > 3){
    $nivo = 3;
}

include("./kernel/database_wrapper.php");
$db = new Database("parking");
$db->Connect();
if($db->prikaziParking($nivo)){
    $db-> __destruct();
}

$sektorAdmin = "";
$mestoAdmin = "";
 
?>
<h1> Nivo: <?php echo $nivo;?></h1>
<style>
.col {
	 border: 0.5px solid black;
	 padding: 10px;
 }
 
</style>
<div class="container" style="width:1300px; margin-top: 25px;border-style: solid;">
    
	<?php while($row = $db->getResult()->fetch_assoc()) {

        $color= ($row["occupied"] == '1') ? '#ff4d4d' : '#80ff00';
        $info = ($row["occupied"] == '1') ? 'data-toggle="modal" data-target="#exampleModalCenter"': '';
        $link = ($row["occupied"] == '1') ? "parking&nivo=".$nivo : "reserve&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];

        if ($row["occupied"] == '1' && isset($_SESSION['ADMIN'])){
            $sektorAdmin = $row["sector"];
            $mestoAdmin = $row["place"];
        }

        switch($row['place']){
                case '1': ?>
                <div class="row">

                    <div class="col " style=<?php echo "background-color:".$color?> <?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                    <?php if (isset($_SESSION['CLIENT'])){?>
                        <a href="index.php?stranica=<?php echo $link; ?>">
                        <?php } echo $row["sector"]."-".$row["place"]; 
                        if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>

                <?php break;

                case '3':
                                    
                if($row['sector'] == 'D1'){ ?> 
                <div class="row">
                    <div class="col">ODOZDO</div><div class="col">DOLE</div>
                <?php   }  ?>

                <div class="col " style=<?php echo "background-color:".$color?> <?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                    <?php if (isset($_SESSION['CLIENT'])){?>
                        <a href="index.php?stranica=<?php echo $link; ?>">
                        <?php } echo $row["sector"]."-".$row["place"]; 
                        if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div> 

                <?php   break;

                case '5':
                    
                    if($row['sector'] == 'A1'){ ?> 
                    <div class="row">
                        <div class="col">ULAZ</div><div class="col">IZLAZ</div><div class="col">ODOZGO</div><div class="col">GORE</div>
            <?php   } 

                    if($row['sector'] == 'B1' || $row['sector'] == 'C1'){ ?> 
                    <div class="row">
                        <div class="col">ODOZDO</div><div class="col">DOLE</div><div class="col">ODOZGO</div><div class="col">GORE</div>
            <?php   } ?>

                    <div class="col " style=<?php echo "background-color:".$color?> <?php if (isset($_SESSION['ADMIN'])) { echo $info; }?>>
                        <?php if (isset($_SESSION['CLIENT'])){?>
                            <a href="index.php?stranica=<?php echo $link; ?>">
                            <?php } echo $row["sector"]."-".$row["place"]; 
                            if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div> 

        <?php   break;

                case '12':

                   if($row["sector"] == 'A5' || $row["sector"] == 'A8' || $row["sector"] == 'A11' || 
                   $row["sector"] == 'B5' || $row["sector"] == 'B8' || $row["sector"] == 'B11' || 
                   $row["sector"] == 'C5' || $row["sector"] == 'C8' || $row["sector"] == 'C11' ||
                   $row["sector"] == 'D5' || $row["sector"] == 'D8' || $row["sector"] == 'D11'){ //prolaz za vozila horizontalno ?>
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col-10">&nbsp;</div>    
            <?php   } else if($row["sector"] == 'A2' || $row["sector"] == 'B2' || $row["sector"] == 'C2' || $row["sector"] == 'D2'){ ?>
                    <div class="row">
                        <div class="col-11">&nbsp;</div>
                        <div class="col-0.5">&nbsp;</div>   
            <?php   } else { ?>
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>  
            <?php   } ?>

                <div class="col " style=<?php echo "background-color:".$color?> <?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                <?php if (isset($_SESSION['CLIENT'])) {?>
                    <a href="index.php?stranica=<?php echo $link; ?>">
                    <?php } echo $row["sector"]."-".$row["place"]; 
                    if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div> 

                </div> 
        <?php   break;

                case '2':

                    if($row['sector'] != 'A12' && $row['sector'] != 'B12' && $row['sector'] != 'C12' && $row['sector'] != 'D12'){ ?> 
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php   } else { ?>
                    <div class="row">
                        <div class="col">x</div>
             <?php  } ?>

             <div class="col " style=<?php echo "background-color:".$color?> <?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
            <?php if (isset($_SESSION['CLIENT'])){?>
                <a href="index.php?stranica=<?php echo $link; ?>">
                <?php } echo $row["sector"]."-".$row["place"]; 
                if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>  

            <?php   break;

                case '7':

                    if($row['sector'] != 'A12' && $row['sector'] != 'A1' && $row['sector'] != 'B12' && $row['sector'] != 'B1' && 
                        $row['sector'] != 'C12' && $row['sector'] != 'C1' && $row['sector'] != 'D12' && $row['sector'] != 'D1'){ ?> 
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php   } ?>

            <div class="col " style=<?php echo "background-color:".$color?> <?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
            <?php if (isset($_SESSION['CLIENT'])){?>
                <a href="index.php?stranica=<?php echo $link; ?>">
                <?php } echo $row["sector"]."-".$row["place"]; 
                if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>

            <?php break;

                case '11': ?>

                    <div class="col " style=<?php echo "background-color:".$color?> <?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                    <?php if (isset($_SESSION['CLIENT'])){?>
                        <a href="index.php?stranica=<?php echo $link; ?>">
                        <?php } echo $row["sector"]."-".$row["place"]; 
                        if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>

                   <?php if($row['sector'] == 'A12' || $row['sector'] == 'A1' || $row['sector'] == 'B12' || $row['sector'] == 'B1' ||
                            $row['sector'] == 'C12' || $row['sector'] == 'C1' || $row['sector'] == 'D12' || $row['sector'] == 'D1'){ ?> 
                        <div class="col">x</div>
                    </div>
            <?php   } ?>
                  
        <?php break;

                default: ?>

                    <div class="col " style=<?php echo "background-color:".$color?> <?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                    <?php if (isset($_SESSION['CLIENT'])) {?>
                        <a href="index.php?stranica=<?php echo $link; ?>">
                        <?php } echo $row["sector"]."-".$row["place"]; 
                        if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>  

                <?php break;
        }
            
    }
    ?>
<!-- Modal -->
<?php
    if(!empty($sektorAdmin) && !empty($mestoAdmin)){
        $db->korisnikInfo($nivo, $sektorAdmin, $mestoAdmin);
        $rezultat = $db->getResult()->fetch_assoc();

        if ($rezultat['Tip'] == "individual") {
            $rezultat['Tip'] = "Fizicko lice";
        } else if ($rezultat['Tip'] == "business") {
            $rezultat['Tip'] = "Pravno lice";
        }
    
?>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Informacije o korisniku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        Tip klijenta: <?php echo $rezultat['Tip']; ?>
                    </div>
                    <div class="form-group">
                        Ime i Prezime: <?php echo $rezultat['ImePrezime']; ?>
                    </div>
                    <div class="form-group">
                        Email: <?php echo $rezultat['email']; ?>
                    </div>
                    <div class="form-group">
                        Telefon: <?php echo $rezultat['telefon']; ?>
                    </div>
                    <div class="form-group">
                        Broj registarske tablice: <?php echo $rezultat['registracija']; ?>
                    </div>
                    <div class="form-group">
                        Datum i vreme dolaska: <?php echo $rezultat['DatumVreme']; ?>
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<br>
<div class="form-group">
    <?php 
    if($nivo > 0){ ?>
        <a class="btn btn-primary" href=<?php echo "index.php?stranica=parking&nivo=".($nivo-1);?>>Nivo <?php echo ($nivo-1);?> <</a>
   <?php }
    if($nivo < 3){ ?>
        <a class="btn btn-primary" href=<?php echo "index.php?stranica=parking&nivo=".($nivo+1);?>>Nivo <?php echo ($nivo+1);?> ></a>
   <?php } ?>
</div>