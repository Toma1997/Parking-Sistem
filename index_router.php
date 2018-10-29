<?php

$stranica = $_GET['stranica'] ?? '';

switch ($stranica) {
	case '' :
		include('templates/Client/index.php');
		break;
		
	case 'register' :
		include('templates/Client/register.php');
		break;
		
	case 'login' :
		include('templates/Client/login.php');
		break;
		
	case 'parking' :
		include('templates/Client/parking.php');
		break;
		
	case 'reserve' :
		include('templates/Client/reserve.php');
		break;
	default:
		echo 'Greška 404! Nemam takvu stranicu.';
		break;
}


?>