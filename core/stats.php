<?php
include("database_wrapper.php");
$db = new Database("parking");
$db->Connect();

$zauzetostDnevnoSektori = $db->zauzetostSektorDnevno();
$zauzetostDnevnoNivoi = $db->zauzetostNivoDnevno();
$tipKlijentaGodisnje = $db->tipKlijentaGodisnje();

// json nizovi se salju u stats.html
echo json_encode([
    'zauzetostDnevnoSektori' => $zauzetostDnevnoSektori,
    'zauzetostDnevnoNivoi' => $zauzetostDnevnoNivoi,
    'tipKlijentaGodisnje' => $tipKlijentaGodisnje
]); 

?>