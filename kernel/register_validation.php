<?php

if ($_POST) {
	extract($_POST);
	$greske = array();

	if(!preg_match("/^[A-Z][a-zA-Z']+[ ]+[A-Z][a-zA-Z'\- ]*$/", $forename)){
		$greske[] = "<h3>Ime nije validno !</h3>";
	}

	if(!preg_match("/^[A-Z][a-zA-Z']+[ ]+[A-Z][a-zA-Z'\- ]*$/", $surname)){
		$greske[] = "<h3>Prezime nije validno !</h3>";
	}

	if(count($greske)){
		$greske = implode("<br>", $greske);
		echo $greske;
	} else{
		echo "<h3> Uspesno ste popunili formu !</h3>";
	}

}
?>
	</body>
</html>
