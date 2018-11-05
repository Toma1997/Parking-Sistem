<?php 

include("./kernel/database_wrapper.php");
$db = new Database("parking");
$db->Connect();
$db->prikaziParking(0);
 
?>
<h1> Nivo: 0</h1>
<style>
.col {
	 border: 0.5px solid black;
	 padding: 10px;
 }
 
</style>
<div class="container" style="width:1300px; margin-top: 25px;border-style: solid;">
    
	<?php if (isset($_SESSION['ADMIN'])):?>
	<?php while($row = $db->getResult()->fetch_assoc()) {

            $color= ($row["occupied"] == '1') ? '#ff4d4d' : '#80ff00';
			$info = ($row["occupied"] == '1') ? 'data-toggle="modal" data-target="#exampleModalCenter"' : '';
            switch($row['place']){
                case '1': ?>
                <div class="row">
                    <div class="col " style=<?php echo "background-color:".$color?> <?php echo $info; ?> ><?php echo $row["sector"]."-".$row["place"];?></div>  
                <?php break;

                case '5':
                    if($row['sector'] == 'A1'){ ?> 
                    <div class="row">
                        <div class="col">ULAZ</div><div class="col">IZLAZ</div><div class="col">ODOZGO</div><div class="col">GORE</div>
        <?php   } ?>
                <div class="col" style=<?php echo "background-color:".$color?> <?php echo $info; ?>><?php echo $row["sector"]."-".$row["place"];?></div>  
        <?php   break;

                case '12': ?>
            <?php   if($row["sector"] == 'A5' || $row["sector"] == 'A8' || $row["sector"] == 'A11'){ //prolaz za vozila horizontalno ?>
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col-10">&nbsp;</div>    
            <?php   } else if($row["sector"] == 'A2'){ ?>
                    <div class="row">
                        <div class="col-11">&nbsp;</div>
                        <div class="col-0.5">&nbsp;</div>   
            <?php   } else { ?>
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>  
            <?php   } ?>
                    <div class="col" style=<?php echo "background-color:".$color?> <?php echo $info; ?>><?php echo $row["sector"]."-".$row["place"];?></div>  
                </div> 
        <?php   break;

                case '2':
                    if($row['sector'] != 'A12'){ ?> 
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php   } else { ?>
                    <div class="row">
                        <div class="col">x</div>
             <?php  } ?>
                    <div class="col" style=<?php echo "background-color:".$color?> <?php echo $info; ?>><?php echo $row["sector"]."-".$row["place"];?></div>  

            <?php   break;

                case '7':
                    if($row['sector'] != 'A12' && $row['sector'] != 'A1'){ ?> 
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php   } ?>
                    <div class="col" style=<?php echo "background-color:".$color?> <?php echo $info; ?>><?php echo $row["sector"]."-".$row["place"];?></div>  
            <?php break;

                case '11': ?>
                    <div class="col" style=<?php echo "background-color:".$color?> <?php echo $info; ?>><?php echo $row["sector"]."-".$row["place"];?></div>  
                   <?php if($row['sector'] == 'A12' || $row['sector'] == 'A1'){ ?> 
                        <div class="col">x</div>
                    </div>
            <?php   } ?>
                  
        <?php break;
                default: ?>
                    <div class="col" style=<?php echo "background-color:".$color?> <?php echo $info; ?>><?php echo $row["sector"]."-".$row["place"];?></div>  
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
                   Ime i Prezime:
                </div>
                <div class="form-group">
                    Telefon:
                </div>
                <div class="form-group">
                    Broj registarske tablice:
                </div>
                <div class="form-group">
					Datum rezervacije: 
                </div>
				<div class="form-group">
					Datum isteka rezervacije:
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
      </div>
    </div>
  </div>
</div>
	
	
	<?php else:?>
	<?php while($row = $db->getResult()->fetch_assoc()) {

            $color= ($row["occupied"] == '1') ? '#ff4d4d' : '#80ff00';
            switch($row['place']){
                case '1': ?>
                <div class="row">
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["sector"]."-".$row["place"];?></a></div>
                <?php break;

                case '5':
                    if($row['sector'] == 'A1'){ ?> 
                    <div class="row">
                        <div class="col">ULAZ</div><div class="col">IZLAZ</div><div class="col">ODOZGO</div><div class="col">GORE</div>
        <?php   } ?>
                <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["sector"]."-".$row["place"];?></a></div>  
        <?php   break;

                case '12': ?>
            <?php   if($row["sector"] == 'A5' || $row["sector"] == 'A8' || $row["sector"] == 'A11'){ //prolaz za vozila horizontalno ?>
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                        <div class="col-10">&nbsp;</div>    
            <?php   } else if($row["sector"] == 'A2'){ ?>
                    <div class="row">
                        <div class="col-11">&nbsp;</div>
                        <div class="col-0.5">&nbsp;</div>   
            <?php   } else { ?>
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>  
            <?php   } ?>
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["sector"]."-".$row["place"];?></a></div>
                </div> 
        <?php   break;

                case '2':
                    if($row['sector'] != 'A12'){ ?> 
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php   } else { ?>
                    <div class="row">
                        <div class="col">x</div>
             <?php  } ?>
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["sector"]."-".$row["place"];?></a></div>  

            <?php   break;

                case '7':
                    if($row['sector'] != 'A12' && $row['sector'] != 'A1'){ ?> 
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php   } ?>
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["sector"]."-".$row["place"];?></a></div>  
            <?php break;

                case '11': ?>
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["sector"]."-".$row["place"];?></a></div>
                   <?php if($row['sector'] == 'A12' || $row['sector'] == 'A1'){ ?> 
                        <div class="col">x</div>
                    </div>
            <?php   } ?>
                  
        <?php break;
                default: ?>
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["sector"]."-".$row["place"];?></a></div>
                <?php break;
            }
            
        }
    ?>
	<?php endif;?>
</div>
