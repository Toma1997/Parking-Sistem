<?php 
include("./kernel/database_wrapper.php");
$db = new Database("parking");
$db->Connect();
$db->prikaziParking(0);
// SAMO SE TESTIRA PRIKAZ, DIZAJN PARKINGA NEZGODAN ZA PRIKAZ POLJA IZ TABELE NA MAPI
?>
    <table border="1" cellpadding="4">
    <tr>
    <td bgcolor="#CCCCCC"><strong>Sektor</strong></td><td bgcolor="#CCCCCC"><strong>Mesto</strong></td>
    <td bgcolor="#CCCCCC"><strong>Nivo</strong></td><td bgcolor="#CCCCCC"><strong>Zauzetost</strong></td>
    </tr>
       <?php while($row = $db->getResult()->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["sector"]; ?></td>
            <td><?php echo $row["place"]; ?></td>
            <td><?php echo $row["floor"]; ?></td>
            <td bgcolor='<?php if($row["occupied"] == '1') {echo "red";} else { echo "green";}?>'></td>
            </tr>
<?php 
}

if (isset($_SESSION['CLIENT'])):   
?>
<div class="container " style="margin-top: 25px;border-style: dotted;">
<div class="row"><div class="col">ULAZ</div><div class="col">GORE</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col">x</div></div>
<div class="row"><div class="col-11">&nbsp;</div><div class="col-0.5">&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col" ><a href="index.php?stranica=reserve"> A1</a></div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-10">&nbsp;</div><div class="col-0.5">&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-10">&nbsp;</div><div class="col-0.5">&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-10">&nbsp;</div><div class="col-0.5">&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">x</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col">x</div></div>
</div>
<?php else: ?>
<div class="container " style="margin-top: 25px;border-style: dotted;">
<div class="row"><div class="col">ULAZ</div><div class="col">GORE</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col">x</div></div>
<div class="row"><div class="col-11">&nbsp;</div><div class="col-0.5">&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-10">&nbsp;</div><div class="col-0.5">&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-10">&nbsp;</div><div class="col-0.5">&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col-0.5">&nbsp;&nbsp;&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">A1</div><div class="col-10">&nbsp;</div><div class="col-0.5">&nbsp;</div><div class="col">A12</div></div>
<div class="row"><div class="col">x</div><div class="col">A2</div><div class="col">A3</div><div class="col">A4</div><div class="col">A5</div><div class="col">A6</div><div class="col">A7</div><div class="col">A8</div> <div class="col">A9</div><div class="col">A10</div><div class="col">A11</div><div class="col">x</div></div>
</div>
<?php endif; ?>