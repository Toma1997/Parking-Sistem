<?php

$stranica = $_GET['stranica'] ?? '';
session_start();
if ($stranica == 'logout') {
	session_unset();
}

require_once 'templates/header.php';
require_once 'templates/menu.php';

switch ($stranica) {
	case '' :
	case 'logout':
		include('modules/home.php');
		break;
	case 'contact':
		include('modules/contact.php');
		break;
	case 'price':
		include('modules/price.php');
		break;
	case 'messages':
		admin();
		include('modules/messages.php');
		break;
	case 'addAdmin':
		admin();
		include('modules/dodajAdmina.php');
		break;
	case 'register' :
		korisnik();
		include('modules/register.php');
		break;
	case 'login' :
		korisnik();
		include('modules/login.php');
		break;
	case 'parking' :
		include('modules/parking.php');
		break;
	case 'reserve' :
		anonimac();
		include('modules/reserve.php');
		break;
	default:
		echo '<div class="card-body"> <h4 class="card-title">Greška 404! Nemam takvu stranicu.</h4></div>';
		break;
}

require_once 'templates/footer.php';

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