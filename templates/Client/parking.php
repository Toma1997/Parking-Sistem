<?php 

include("./kernel/database_wrapper.php");
$db = new Database("parking");
$db->Connect();
$db->prikaziParking(0);
 
?>
<h1> Nivo: 0</h1>
<div class="container " style="width:1300px; margin-top: 25px;border-style: dotted;">
    
    <?php while($row = $db->getResult()->fetch_assoc()) {

            $color= ($row["occupied"] == '1') ? '#ff4d4d' : '#80ff00';
            switch($row['place']){
                case '1': ?>
                <div class="row">
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["floor"]."-".$row["sector"]."-".$row["place"];?></a></div>
                <?php break;

                case '5':
                    if($row['sector'] == 'A1'){ ?> 
                    <div class="row">
                        <div class="col">ULAZ</div><div class="col">IZLAZ</div><div class="col">ODOZGO</div><div class="col">GORE</div>
        <?php   } ?>
                <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["floor"]."-".$row["sector"]."-".$row["place"];?></a></div>  
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
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["floor"]."-".$row["sector"]."-".$row["place"];?></a></div>
                </div> 
        <?php   break;

                case '2':
                    if($row['sector'] != 'A12'){ ?> 
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php   } else { ?>
                    <div class="row">
                        <div class="col">x</div>
             <?php  } ?>
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["floor"]."-".$row["sector"]."-".$row["place"];?></a></div>  

            <?php   break;

                case '7':
                    if($row['sector'] != 'A12' && $row['sector'] != 'A1'){ ?> 
                        <div class="col-0.5">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <?php   } ?>
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["floor"]."-".$row["sector"]."-".$row["place"];?></a></div>  
            <?php break;

                case '11': ?>
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["floor"]."-".$row["sector"]."-".$row["place"];?></a></div>
                   <?php if($row['sector'] == 'A12' || $row['sector'] == 'A1'){ ?> 
                        <div class="col">x</div>
                    </div>
            <?php   } ?>
                  
        <?php break;
                default: ?>
                    <div class="col" style=<?php echo "background-color:".$color?> ><a href="index.php?stranica=reserve<?php echo "&"."floor=".$row["floor"]."&"."sector=".$row["sector"]."&"."place=".$row["place"];?>"><?php echo $row["floor"]."-".$row["sector"]."-".$row["place"];?></a></div>
                <?php break;
            }
            
        }
    ?>
</div>