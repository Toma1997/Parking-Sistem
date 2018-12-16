<?php
include("database_wrapper.php");
$db = new Database("parking");
$db->Connect();

$db->zauzetostSektorDnevno();
$zauzetostDnevnoSektori = $db->getResult()->fetch_all();

$db->zauzetostNivoDnevno();
$zauzetostDnevnoNivoi = $db->getResult()->fetch_all();

// tipovi klijenta i mesecna raspodela
$tipKlijentaMeseci = array('individual' => array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0), 
                            'business' => array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0));

$db->tipKlijentaMeseci();
// statistika za raspodelu prosecne zauzetosti po mesecima za tipove korisnika
while($termin = $db->getResult()->fetch_assoc()){

    $pocetak = $termin['pocetak'];
    $kraj = $termin['kraj'];

    // ako korisnik jos uvek boravi vadi danasnji mesec i azuriraj kraj
    if($kraj == 0){
        $kraj = date('n'); // vraca trenutni mesec u numerickom obliku (1..12)
    }

    if($kraj == $pocetak){ // ako je korisnik bio samo tokom jednog meseca
        $tipKlijentaMeseci[$termin['tip']][$kraj-1]++;

    } else { // ako korisnik boravi vise meseci
        $tipKlijentaMeseci[$termin['tip']][$pocetak-1]++; // povecaj zauzece zapoceti mesec
        $tipKlijentaMeseci[$termin['tip']][$kraj-1]++; // povecaj zauzece krajnji ili trenutni mesec ako jos uvek boravi

        // inkrementiraj zauzece za mesece izmedju pocetnog i krajnjeg
        for($i = $pocetak; $i < $kraj-1; $i++){
            $tipKlijentaMeseci[$termin['tip']][$i]++;
        }
    }

}

// salji ajax response u json formatu na stats.html
echo json_encode([
    'zauzetostDnevnoSektori' => $zauzetostDnevnoSektori,
    'zauzetostDnevnoNivoi' => $zauzetostDnevnoNivoi,
    'tipKlijentaMeseci' => $tipKlijentaMeseci
]); 

?>