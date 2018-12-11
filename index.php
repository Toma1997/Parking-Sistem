<?php

$jezik = '';

if (isset($_SESSION["ADMIN"])){
	$jezik = 'srpski_latinica';
	
} else{
	$jezik = $_COOKIE['jezik'] ?? 'srpski_latinica';

	if($_GET && $jezik = $_GET['jezik'] ?? $jezik){
		setcookie('jezik', $jezik);
	}
}


include_once(
	sprintf(
		'./lang/%s.php',
		$jezik
	)
);

$stranica = $_GET['stranica'] ?? ' ';
session_start();
if ($stranica == 'logout') {
	session_unset();
}


$header = file_get_contents('templates/header.html');

// admin nema visejezicnost
if (!isset($_SESSION["ADMIN"])) {
	$header = str_replace('{{JEZIK}}', $jezici_mapa['lang'], $header);
}else {
	$header = str_replace('{{JEZIK}}', '', $header);
}

$header = str_replace('{{LOGO}}', $jezici_mapa['logo'], $header);


if (!isset($_SESSION["CLIENT"]) && !isset($_SESSION["ADMIN"])) {
	$header = str_replace('{{LOGIN}}', $jezici_mapa['login'], $header);
} else {
	$header = str_replace('{{LOGIN}}', $jezici_mapa['logout'], $header);
}

if ($stranica == 'parking') {
$header = str_replace('{{URL}}', $stranica. '&nivo=' . $_GET['nivo'], $header);
}elseif ($stranica == 'reserve') {
$header = str_replace('{{URL}}', $stranica. '&floor='. $_GET['floor'].'&sector='.$_GET['sector'].'&place=' . $_GET['place'], $header);
}
else {
	$header = str_replace('{{URL}}', $stranica, $header);
}

echo $header;


$menu = file_get_contents('templates/menu.html');
$menu = str_replace('{{LOGO}}', $jezici_mapa['logo'], $menu);

if (isset($_SESSION['CLIENT'])) {
	$menu = str_replace('{{MENU}}', $jezici_mapa['menu'].$jezici_mapa['client'], $menu);
}elseif (isset($_SESSION['ADMIN'])) {
	$menu = str_replace('{{MENU}}', $jezici_mapa['menu'].$jezici_mapa['admin'], $menu);	
}  else {
	$menu = str_replace('{{MENU}}', $jezici_mapa['menu'], $menu);
}

echo $menu;

switch ($stranica) {
	case '':
	case ' ':
	case 'logout':
		include('modules/home.php');
		$home = file_get_contents('templates/home.html');
		for ($i=1;$i<7;$i++) {
			$home = str_replace(sprintf('{{TEXT%s}}',$i), $jezici_mapa['text'][$i-1], $home);
		}
		echo $home;
		break;
	case 'contact':
		$contact = file_get_contents('templates/contact.html');
		for ($i=1;$i<10;$i++) {
			$contact = str_replace(sprintf('{{CONTACT%s}}',$i), $jezici_mapa['contact'][$i-1], $contact);
		}
		echo $contact;
		break;
	case 'price':
		$price = file_get_contents('templates/price.html');
		for ($i=1;$i<5;$i++) {
			$price = str_replace(sprintf('{{PRICE%s}}',$i), $jezici_mapa['price'][$i-1], $price);
		}
		for ($i=1;$i<3;$i++) {
			$price = str_replace(sprintf('{{TYPE%s}}',$i), $jezici_mapa['type'][$i-1], $price);
		}
		echo $price;
		break;
	case 'messages':
		admin();
		include('modules/messages.php');
		break;
	case 'addAdmin':
		admin();
		include('modules/dodajAdmina.php');
		break;
	case 'stats':
		admin();
		$stats = file_get_contents('templates/stats.html');
		$stats = str_replace('{{STATS}}', $jezici_mapa['stats'], $stats);
		echo $stats;
		break;
	case 'register' :
		korisnik();
		include('modules/register.php');
		break;
	case 'login' :
		korisnik();
		include('modules/login.php');
		break;
	case 'parking':
		include('modules/parking.php');
		break;
	case 'reserve' :
		anonimac();
		include('modules/reserve.php');
		break;
	default:
		echo $jezici_error['link'];
		break;
}

$footer = file_get_contents('templates/footer.html');

$footer = str_replace('{{COPYRIGHT}}', $jezici_mapa['copyright'], $footer);
echo $footer;


function anonimac() {
	if (!isset($_SESSION['CLIENT']) && !isset($_SESSION['ADMIN'])) {
		header("Location: ./index.php?stranica=register");
		exit;
	}
}
function korisnik() {
	if (isset($_SESSION['CLIENT']) || isset($_SESSION['ADMIN'])) {
		header("Location: ./index.php?stranica=");
		exit;
	}	
}
function admin() {
	if (!isset($_SESSION['ADMIN'])) {
		header("Location: ./index.php?stranica=");
		exit;
	}	
}	

?>