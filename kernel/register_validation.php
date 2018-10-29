<?php


require_once '../templates/main/header.php';

if ($_POST) {
	extract($_POST);
	$greske = array();

	if(!preg_match("/^[A-Z][a-zA-Z']+$/", $forename)){
		$greske[] = "<h3>Ime nije validno !</h3>";
	}

	if(!preg_match("/^[A-Z][a-zA-Z']+$/", $surname)){
		$greske[] = "<h3>Prezime nije validno !</h3>";
	}

	if(!preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $email)){
		$greske[] = "<h3>Email nije validan !</h3>";
	}

	if(!preg_match("/^06[0-9]\-[0-9]{3,4}\-[0-9]{3,4}$/", $telephone)){
		$greske[] = "<h3>Telefon nije validan !</h3>";
	}
	

	if(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*(?=\S*[\W])$/", $password1)){
		$greske[] = "<h3>Lozinka nije validna !</h3>";
	} else {
		if($password1 !== $password2){
			$greske[] = "<h3>Nije uspesno potvrdjena lozinka !</h3>";
		}
	}

	if(count($greske)){
		$greske = implode("<br>", $greske);
		echo $greske;
	} else{

		include("database_wrapper.php");
		$db = new Database();
		$db->Connect();
		if($db->dodajKorisnika($_POST)){
			echo "<h3> Uspesno ste registrovani !</h3>";
		} else {
			echo "<h3> Greska pri validaciji forme !</h3>";
		}

		header("Location: ../templates/Client/login.php");
	}

}

require_once '../templates/main/footer.php';
?>
	</body>
</html>
