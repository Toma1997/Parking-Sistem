<?php

$stranica = $_GET['stranica'] ?? '';

require_once 'templates/main/header.php';


switch ($stranica) {
	case '' :
		include('templates/client/home.php');
		break;
		
	case 'register' :
		include('templates/client/register.php');
		break;
		
	case 'login' :
		include('templates/client/login.php');
		break;
		
	case 'parking' :
		include('templates/client/parking.php');
		break;
		
	case 'reserve' :
		include('templates/client/reserve.php');
		break;
	default:
		echo '<div class="card-body"> <h4 class="card-title">Greška 404! Nemam takvu stranicu.</h4></div>';
		break;
}
require_once 'templates/main/footer.php';

?>