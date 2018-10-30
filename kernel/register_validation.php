<?php

if ($_POST) {
	extract($_POST);
	$greske = array();

	if(!preg_match("/^[A-Z][a-zA-Z']+$/", $forename)){
		$greske[] = "<h3>Ime nije validno !</h3>";
	}

	if(!preg_match("/^[A-Z][a-zA-Z']+$/", $surname)){
		$greske[] = "<h3>Prezime nije validno !</h3>";
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$greske[] = "<h3>Email nije validan !</h3>";
	}

	if(!preg_match("/^06[0-9]\-[0-9]{3,4}\-[0-9]{3,4}$/", $telephone)){
		$greske[] = "<h3>Telefon nije validan !</h3>";
	}
	
	if(!preg_match("/^^(?=[^\d]*\d)(?=[A-Z\d ]*[^A-Z\d ]).{8,}$/", $password1)){
		$greske[] = "<h3>Lozinka nije validna !</h3>";
	} else {
		if($password1 !== $password2){
			$greske[] = "<h3>Nije uspesno potvrdjena lozinka !</h3>";
		}
	}

	if(count($greske)){
		$greske = implode("<br>", $greske);
		echo $greske;
		header("Location: ../index.php?stranica=register");
	} else{

		include("database_wrapper.php");
		$db = new Database("parking");
		$db->dodajKorisnika($_POST);

		if($db->getResult()){
			header("Location: ../index.php?stranica=login");
		}
	}

}

?>
	</body>
</html>
