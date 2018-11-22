<?php

$stranica = $_GET['stranica'] ?? '';
session_start();
if ($stranica == 'logout') {
	session_unset();
}

require_once 'templates/main/header.php';

switch ($stranica) {
	case '' :
	case 'logout':
		include('templates/Client/home.php');
		break;
	case 'contact':
		include('templates/Client/contact.php');
		break;
	case 'price':
		include('templates/Client/price.php');
		break;
	case 'messages':
		admin();
		include('templates/Client/messages.php');
		break;
	case 'addAdmin':
		admin();
		include('templates/Client/dodajAdmina.php');
		break;
	case 'register' :
		korisnik();
		include('templates/Client/register.php');
		break;
	case 'login' :
		korisnik();
		include('templates/Client/login.php');
		break;
	case 'parking' :
		include('templates/Client/parking.php');
		break;
	case 'reserve' :
		anonimac();
		include('templates/Client/reserve.php');
		break;
	default:
		echo '<div class="card-body"> <h4 class="card-title">Greška 404! Nemam takvu stranicu.</h4></div>';
		break;
}
require_once 'templates/main/footer.php';

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