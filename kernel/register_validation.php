<?php

if ($_POST) {
	extract($_POST);
	$greske = array();

	echo $registration;

	if(!preg_match("/^[A-Z][a-zA-Z']+[ ]+[A-Z][a-zA-Z'\- ]*$/", $forename)){
		$greske[] = "<h3>Ime nije validno !</h3>";
	}

	if(!preg_match("/^[A-Z][a-zA-Z']+[ ]+[A-Z][a-zA-Z'\- ]*$/", $surname)){
		$greske[] = "<h3>Prezime nije validno !</h3>";
	}

	if(!preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $email)){
		$greske[] = "<h3>Email nije validan !</h3>";
	}

	if(!preg_match("/^06[0-9]\-[0-9]{3,4}\-[0-9]{3,4}$/", $telephone)){
		$greske[] = "<h3>Telefon nije validan !</h3>";
	}

	do{
		$i = 1;
		$registration = "registration" . $i;
		// $$registration je promenljiva sa nazivom registration1, registration2 ...
		if(!preg_match("/^06[0-9]\-[0-9]{3,4}\-[0-9]{3,4}$/", $$registration)){
			$greske[] = "<h3>" . $i . ". Registracija nije validna !</h3>";
		}
		$i++;
	} while(isset($$registration));
	

	if(!preg_match("/^[^ \W]{8, 255}$/", $password1)){
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
		echo "<h3> Uspesno ste registrovani !</h3>";

		include("kernel/database_wrapper.php");
		$db = new Database();
		$db->Connect();
		$db->dodajKorisnikaIVozilo($_POST);

	}

}
?>
	</body>
</html>
