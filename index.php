<?php

$stranica = $_GET['stranica'] ?? '';
session_start();


if ($stranica == 'logout') {
	unset($_SESSION['CLIENT']);
	header("Location: ./");
}
require_once 'templates/main/header.php';


switch ($stranica) {
	case '' :
		include('templates/client/home.php');
		break;
		
	case 'register' :
		korisnik();
		include('templates/client/register.php');
		break;
		
	case 'login' :
		korisnik();
		include('templates/client/login.php');
		break;
		
	case 'parking' :
		anonimac();
		include('templates/client/parking.php');
		break;
		
	case 'reserve' :
		anonimac();
		include('templates/client/reserve.php');
		break;
	default:
		echo '<div class="card-body"> <h4 class="card-title">Greška 404! Nemam takvu stranicu.</h4></div>';
		break;
}
require_once 'templates/main/footer.php';

function anonimac() {
	if (!isset($_SESSION['CLIENT'])) {
		header("Location: ./index.php?stranica=register");
		exit;
	}
}
function korisnik() {
	if (isset($_SESSION['CLIENT'])) {
		header("Location: ./");
		exit;
	}	
}
	

?>