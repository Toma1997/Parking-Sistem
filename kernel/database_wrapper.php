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
	function dodajKorisnika($client_type, $forename, $surname, $email, $telephone, $password1, $admin) {

		// filtrira i sredjuje string iz json formata
		$tip = mysqli_real_escape_string($this->dblink, $client_type);
		$ime = mysqli_real_escape_string($this->dblink, $forename);
		$prezime = mysqli_real_escape_string($this->dblink, $surname);
		$mail = mysqli_real_escape_string($this->dblink, $email);
		$telefon = mysqli_real_escape_string($this->dblink, $telephone);
		$lozinka = sha1(mysqli_real_escape_string($this->dblink, $password1)); // SHA1 hes funkcija
		$administrator = mysqli_real_escape_string($this->dblink, $admin);

		$values = "('".$tip."','".$ime."','".$prezime."','".$telefon."','".$mail."','".$lozinka."','".$administrator."')";

		// upit koji dodaje podatke o novom korisniku
		$query = 'INSERT into clients (client_type, forename, surname, telephone, email, password_hash, admin) VALUES '.$values;

		// ako je upit vratio true rezultat je true
		if($this->dblink->query($query))
		{
			$this ->result = true;
		}
		else // u suprotnom ako se upit nije lepo izvrsio vrati false
		{
			$this->result = false;
		}
	}

	function proveriKorisnika($naziv_data1, $naziv_data2, $data1, $data2, $operator){

		// filtrira i sredjuje string iz json formata
		$naziv_data11 = mysqli_real_escape_string($this->dblink, $naziv_data1);
		$naziv_data22 = mysqli_real_escape_string($this->dblink, $naziv_data2);
		$data11 = mysqli_real_escape_string($this->dblink, $data1);
		$data22 = mysqli_real_escape_string($this->dblink, $data2);
		$operator1 = mysqli_real_escape_string($this->dblink, $operator);

		// provera da li je korisnik vec registrovan
		$query = 'SELECT client_id FROM clients WHERE '.$naziv_data11.' LIKE "'.$data11.'" '.$operator1.' '.$naziv_data22.' LIKE "'.$data22.'";';
		$rezultat = $this->dblink->query($query);
		if($rezultat->num_rows < 1){
			$this->result = false;
		} else {
			$this ->result = true;
		}
	}

	function jeAdmin($mail){
		$email = mysqli_real_escape_string($this->dblink, $mail);

		$query = 'SELECT admin FROM clients WHERE email = "'.$email.'";';
		$zapis = $this->dblink->query($query);
		$rezultat = $zapis->fetch_assoc();
		if($rezultat['admin'] == '1'){
			$this->result = true;
		} else {
			$this->result = false;
		}
	}

	function prikaziParking($floor){
		$floor1 = mysqli_real_escape_string($this->dblink, $floor);
		
		$query = 'SELECT sector, place, floor, occupied FROM places WHERE floor = '.$floor1.';';
		$this->result = $this->dblink->query($query);
	}

	function unesiRegistraciju($registracija, $mail){
		$registration = mysqli_real_escape_string($this->dblink, $registracija);
		$email = mysqli_real_escape_string($this->dblink, $mail);

		// provera da li je u bazi postoji ista registracija, jer ne smeju biti 2 iste registracije u bazi
		$query = 'SELECT registration FROM cars WHERE registration LIKE"'.$registration.'";';
		$rezultat = $this->dblink->query($query);
		if($rezultat->num_rows < 1){
			$query = 'SELECT client_id FROM clients WHERE email LIKE "'.$email.'";';
			$zapis = $this->dblink->query($query);
			$client_id = $zapis->fetch_assoc();

			$values = "('".$registration."',".(int)$client_id['client_id'].")";

			// upit koji dodaje podatke o novom korisniku
			$query = 'INSERT into cars (registration, client_id) VALUES '.$values;

			if($this->dblink->query($query))
			{
				$this ->result = true;
			}
			else // u suprotnom ako se upit nije lepo izvrsio vrati false
			{
				$this->result = false;
			}

		} else {
			$this ->result = true;
		}

		
	}

	function rezervisiMesto($registracija, $sprat, $sektor, $mesto){
		$registration = mysqli_real_escape_string($this->dblink, $registracija);
		$floor = mysqli_real_escape_string($this->dblink, $sprat);
		$sector = mysqli_real_escape_string($this->dblink, $sektor);
		$place = mysqli_real_escape_string($this->dblink, $mesto);

		$query = 'SELECT occupied FROM places WHERE floor = '.$floor.' AND sector LIKE "'.$sector.'" AND place LIKE "'.$place.'";';
		$zapis = $this->dblink->query($query);
		$rezultat = $zapis->fetch_assoc();
		if($rezultat['occupied'] == '1'){
			$this->result = false;
		} else {
			$query = 'UPDATE places SET occupied = "1" WHERE floor = '.$floor.' AND sector LIKE "'.$sector.'" AND place LIKE "'.$place.'";';
			if($this->dblink->query($query)){
				$query = 'SELECT car_id FROM cars WHERE registration LIKE "'.$registration.'";';
				$zapis = $this->dblink->query($query);
				$car_id = $zapis->fetch_assoc();

				$query = 'SELECT place_id FROM places WHERE floor = '.$floor.' AND sector LIKE "'.$sector.'" AND place LIKE "'.$place.'";';
				$zapis = $this->dblink->query($query);
				$place_id = $zapis->fetch_assoc();

				$values = "(".$car_id['car_id'].",".$place_id['place_id'].")";
				$query = 'INSERT into appointments (car_id, place_id) VALUES '.$values;
				
				if($this->dblink->query($query)){
					$this ->result = true;
				}
			}
		}
	}

	function prikaziSlobodnaMesta($kriterijum){
		$criteria = mysqli_real_escape_string($this->dblink, $kriterijum);

		$query = ($criteria == "sve") ? "SELECT COUNT(place_id) as 'Slobodna mesta' FROM places WHERE occupied = '0';" : 
		"SELECT floor as 'Nivo', COUNT(place_id) as 'Slobodna mesta' FROM places WHERE occupied = '0' GROUP BY floor ORDER BY floor ASC;";
		$this->result = $this->dblink->query($query);

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
