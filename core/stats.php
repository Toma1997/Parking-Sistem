<?php
include("database_wrapper.php");
$db = new Database("parking");
$db->Connect();

$db->zauzetostSektorDnevno();
$zauzetostDnevnoSektori = $db->getResult()->fetch_all();

$db->zauzetostNivoDnevno();
$zauzetostDnevnoNivoi = $db->getResult()->fetch_all();

//$db->tipKlijentaGodisnje();
//$tipKlijentaGodisnje = $db->getResult()->fetch_all();

// json nizovi se salju u stats.html
echo json_encode([
    'zauzetostDnevnoSektori' => $zauzetostDnevnoSektori,
    'zauzetostDnevnoNivoi' => $zauzetostDnevnoNivoi,
    //'tipKlijentaGodisnje' => $tipKlijentaGodisnje
]); 

?>