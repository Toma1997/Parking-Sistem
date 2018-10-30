<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "parking";
	private $dblink;
	private $result = true; // moze biti ili boolean ili rezultat upita
	private $records;
	private $affectedRows;

// konstruktor i instancira ime baze i konekciju
	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

// pribavlja rezultate ili upita ili boolean vrednost
	public function getResult()
	{
		return $this->result;
	}

// destruktor i zatvaranje konekcije baze
	function __destruct()
	{
		$this->dblink->close();
	}

// funckija za konekciju na bazu
	function Connect()
	{
		// kreiranje konekcije
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno) // ako je doslo do greske u konekciji
		{
			// prikazi status
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8"); // ako je uspesna konekcija setuj set karaktera na utf8
	}

// funkcija za dodavanje novog korisnika u bazu
	function dodajKorisnika($data) {
		// kreiranje konekcije
		$mysqli = new mysqli("localhost", "root", "", "parking");

		// filtrira i sredjuje string iz json formata
		$tip = mysqli_real_escape_string($mysqli, $data['client_type']);
		$ime = mysqli_real_escape_string($mysqli, $data['forename']);
		$prezime = mysqli_real_escape_string($mysqli, $data['surname']);
		$email = mysqli_real_escape_string($mysqli, $data['email']);
		$telephone = mysqli_real_escape_string($mysqli, $data['telephone']);
		$password = sha1(mysqli_real_escape_string($mysqli, $data['password1'])); // SHA1 hes funkcija

		// provera da li je korisnik vec registrovan
		$query = "SELECT client_id FROM clients WHERE email LIKE '".$email."' OR telephone LIKE '".$telephone."';";
		$rezultat = $mysqli->query($query);
		if($rezultat->num_rows > 0){
			echo "<h3>Vec ste registrovani !</h3>";
		} else {
			$values = "('".$tip."','".$ime."','".$prezime."','".$telephone."','".$email."','".$password."')";

			// upit koji dodaje podatke o novom korisniku
			$query = 'INSERT into clients (client_type, forename, surname, telephone, email, password_hash) VALUES '.$values;

			// ako je upit vratio true rezultat je true
			if($mysqli->query($query))
			{
				$this ->result = true;
			}
			else // u suprotnom ako se upit nije lepo izvrsio vrati false
			{
				$this->result = false;
			}

		}

		$mysqli->close(); // zatvaranje konekcije
	}

// funkcija koja izvrsava upit
	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
