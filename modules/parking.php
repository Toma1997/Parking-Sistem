<?php 

$nivo = $_GET['nivo'] ?? ' ';
$nivo = (int)$nivo;

if($nivo < 0){
    $nivo = 0;
}

if($nivo > 3){
    $nivo = 3;
}

include("./core/database_wrapper.php");
$db = new Database("parking");
$db->Connect();
if($db->prikaziParking($nivo)){
    $db-> __destruct();
}
?>
<h1> <?php echo $jezici_mapa['info'][0]; echo $nivo;?></h1>
<style>
.col {
	 border: 0.5px solid black;
	 padding: 10px;
 }
 
</style>
<div class="container" style="width:1300px; margin-top: 25px;border-style: solid;">
    
	<?php while($row = $db->getResult()->fetch_assoc()) {
		
		$cursor= ($row["occupied"] == '1') ? 'pointer' : 'default';
        $color= ($row["occupied"] == '1') ? '#ff4d4d' : '#80ff00';
        $info = ($row["occupied"] == '1') ? ' data-id="'.$nivo.'-'. $row["sector"].'-'.$row["place"].'" data-toggle="modal" data-target="#exampleModalCenter"' : '';
        $link = ($row["occupied"] == '1') ? "parking&nivo=".$nivo : "reserve&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];

        switch($row['place']){
                case '1': ?>
                <div class="row">

                     <div class="col" style="<?php echo "background-color:".$color; if (isset($_SESSION['ADMIN'])) {echo ';cursor:'.$cursor;}?>"<?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                    <?php if (isset($_SESSION['CLIENT'])){?>
                        <a href="?stranica=<?php echo $link; ?>" style="color:black;text-decoration:none;">
                        <?php } echo $row["sector"]."-".$row["place"]; 
                        if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>

                <?php break;

                case '3':
                                    
                if($row['sector'] == 'D1'){ ?> 
                <div class="row">
                    <div class="col"><?php echo $jezici_mapa['parking'][4]; ?></div><div class="col"><?php echo $jezici_mapa['parking'][2]; ?></div>
                <?php   }  ?>

                 <div class="col" style="<?php echo "background-color:".$color; if (isset($_SESSION['ADMIN'])) {echo ';cursor:'.$cursor;}?>"<?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                    <?php if (isset($_SESSION['CLIENT'])){?>
                        <a href="?stranica=<?php echo $link; ?>" style="color:black;text-decoration:none;">
                        <?php } echo $row["sector"]."-".$row["place"]; 
                        if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div> 

                <?php   break;

                case '5':
                    
                    if($row['sector'] == 'A1'){ ?> 
                    <div class="row">
                        <div class="col"><?php echo $jezici_mapa['parking'][0]; ?></div><div class="col"><?php echo $jezici_mapa['parking'][1]; ?></div><div class="col"><?php echo $jezici_mapa['parking'][5]; ?></div><div class="col"><?php echo $jezici_mapa['parking'][3]; ?></div>
            <?php   } 

                    if($row['sector'] == 'B1' || $row['sector'] == 'C1'){ ?> 
                    <div class="row">
                        <div class="col"><?php echo $jezici_mapa['parking'][4]; ?></div><div class="col"><?php echo $jezici_mapa['parking'][2]; ?></div><div class="col"><?php echo $jezici_mapa['parking'][5]; ?></div><div class="col"><?php echo $jezici_mapa['parking'][3]; ?></div>
            <?php   } ?>

                     <div class="col" style="<?php echo "background-color:".$color; if (isset($_SESSION['ADMIN'])) {echo ';cursor:'.$cursor;}?>"<?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                        <?php if (isset($_SESSION['CLIENT'])){?>
                            <a href="?stranica=<?php echo $link; ?>" style="color:black;text-decoration:none;">
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

                <div class="col" style="<?php echo "background-color:".$color; if (isset($_SESSION['ADMIN'])) {echo ';cursor:'.$cursor;}?>"<?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                <?php if (isset($_SESSION['CLIENT'])) {?>
                    <a href="?stranica=<?php echo $link; ?>" style="color:black;text-decoration:none;">
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

              <div class="col" style="<?php echo "background-color:".$color; if (isset($_SESSION['ADMIN'])) {echo ';cursor:'.$cursor;}?>"<?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
            <?php if (isset($_SESSION['CLIENT'])){?>
                <a href="?stranica=<?php echo $link; ?>" style="color:black;text-decoration:none;">
                <?php } echo $row["sector"]."-".$row["place"]; 
                if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>  

            <?php   break;

                case '7':

                    if($row['sector'] != 'A12' && $row['sector'] != 'A1' && $row['sector'] != 'B12' && $row['sector'] != 'B1' && 
                        $row['sector'] != 'C12' && $row['sector'] != 'C1' && $row['sector'] != 'D12' && $row['sector'] != 'D1'){ ?> 
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php   } ?>

             <div class="col" style="<?php echo "background-color:".$color; if (isset($_SESSION['ADMIN'])) {echo ';cursor:'.$cursor;}?>"<?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
            <?php if (isset($_SESSION['CLIENT'])){?>
                <a href="?stranica=<?php echo $link; ?>" style="color:black;text-decoration:none;">
                <?php } echo $row["sector"]."-".$row["place"]; 
                if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>

            <?php break;

                case '11': ?>

                     <div class="col" style="<?php echo "background-color:".$color; if (isset($_SESSION['ADMIN'])) {echo ';cursor:'.$cursor;}?>"<?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                    <?php if (isset($_SESSION['CLIENT'])){?>
                        <a href="?stranica=<?php echo $link; ?>" style="color:black;text-decoration:none;">
                        <?php } echo $row["sector"]."-".$row["place"]; 
                        if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>

                   <?php if($row['sector'] == 'A12' || $row['sector'] == 'A1' || $row['sector'] == 'B12' || $row['sector'] == 'B1' ||
                            $row['sector'] == 'C12' || $row['sector'] == 'C1' || $row['sector'] == 'D12' || $row['sector'] == 'D1'){ ?> 
                        <div class="col">x</div>
                    </div>
            <?php   } ?>
                  
        <?php break;

                default: ?>

                     <div class="col" style="<?php echo "background-color:".$color; if (isset($_SESSION['ADMIN'])) {echo ';cursor:'.$cursor;}?>"<?php if (isset($_SESSION['ADMIN'])) {echo $info; }?>>
                    <?php if (isset($_SESSION['CLIENT'])) {?>
                        <a href="?stranica=<?php echo $link; ?>" style="color:black;text-decoration:none;">
                        <?php } echo $row["sector"]."-".$row["place"]; 
                        if(isset($_SESSION['CLIENT'])) {?></a><?php } ?></div>  

                <?php break;
        }
            
    }
    ?>
<!-- Modal -->

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
                        Tip klijenta: <span id="modal-tip"></span>
                    </div>
                    <div class="form-group">
                        Ime i Prezime: <span id="modal-ime-i-prezime"></span>
                    </div>
                    <div class="form-group">
                        Email: <span id="modal-email"></span>
                    </div>
                    <div class="form-group">
                        Telefon: <span id="modal-telefon"></span>
                    </div>
                    <div class="form-group">
                        Broj registarske tablice: <span id="modal-registracija"></span>
                    </div>
                    <div class="form-group">
                        Datum i vreme dolaska: <span id="modal-datumVreme"></span>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="form-group">
    <?php 
    if($nivo > 0){ ?>
        <a class="btn btn-primary" href=<?php echo "?stranica=parking&nivo=".($nivo-1);?>><?php echo $jezici_mapa['info'][0]. ' '. ($nivo-1);?> <</a>
   <?php }
    if($nivo < 3){ ?>
        <a class="btn btn-primary" href=<?php echo "?stranica=parking&nivo=".($nivo+1);?>><?php echo $jezici_mapa['info'][0] . ' '. ($nivo+1);?> ></a>
   <?php } ?>
</div>
<!-- za odjavu sa mesta generisana preko senzora
< ?php if (isset($_SESSION['CLIENT'])) {?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">< ?php echo $jezici_mapa['reserve'][2]; ?></th>
      <th scope="col">< ?php echo $jezici_mapa['reserve'][3]; ?></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">BG-123-SA</th>
      <td>xxx</td>
      <td>xxxx</td>
      <td><button type="button" class="btn btn-danger">< ?php echo $jezici_mapa['reserve'][8]; ?></button></td>
    </tr>
  </tbody>
</table>
< ?php } ?>
-->
<script type="text/javascript">

    $('.col ').click(function(){
        var NivoSektorMesto = $(this).attr('data-id').split("-");
  
        var nivo = NivoSektorMesto[0];
        var sektor = NivoSektorMesto[1];
        var mesto = NivoSektorMesto[2];

        $.ajax({
        type: "POST",
        url: "./core/parking-checker.php",
        data: { "nivo" : nivo, "sektor" : sektor, "mesto" : mesto}
        }).done(function(msg) {
            
            $('#modal-tip').html(msg.Tip);
            $('#modal-ime-i-prezime').html(msg.ImePrezime);
            $('#modal-email').html(msg.email);
            $('#modal-telefon').html(msg.telefon);
            $('#modal-registracija').html(msg.registracija);
            $('#modal-datumVreme').html(msg.DatumVreme);

            $('#exampleModalCenter').show();
		});
    });
</script>