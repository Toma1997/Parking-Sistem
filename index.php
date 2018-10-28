<?php

include('templates/main/header.php');
include('templates/main/menu.php');

$stranica = $_GET['stranica'] ?? '';

switch ($stranica) {
	case '' :
		include('templates/main/page.php');
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
	default :
		echo 'Greška 404! Nemam takvu stranicu.';
		break;
}

include('templates/main/footer.php');

?>