<?php

header("Content-type: application/json");

if (!empty($_POST["sektor"]) && !empty($_POST['mesto']) && isset($_POST['nivo'])){
    $sektorAdmin = $_POST["sektor"];
    $mestoAdmin = $_POST['mesto'];
    $nivoAdmin = (int)$_POST['nivo'];

    include("database_wrapper.php");
    $db = new Database("parking");
    $db->Connect();
    $db->korisnikInfo($nivoAdmin, $sektorAdmin, $mestoAdmin);
    $rezultat = $db->getResult()->fetch_assoc();

    if ($rezultat['Tip'] == "individual") {
        $rezultat['Tip'] = "Fizicko lice";
    } else if ($rezultat['Tip'] == "business") {
        $rezultat['Tip'] = "Pravno lice";
    }
    
    echo json_encode([
        'Tip' => $rezultat['Tip'],
        'ImePrezime' => $rezultat['ImePrezime'],
        'email' => $rezultat['email'],
        'telefon' => $rezultat['telefon'],
        'registracija' => $rezultat['registracija'],
        'DatumVreme' => $rezultat['DatumVreme']
    ]); 

} else {
    die(json_encode([
        'message' => 'neispravan zahtev'
    ]));
}

?>
