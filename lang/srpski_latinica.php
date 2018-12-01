<?php

$jezici_mapa = array(
	'admin' => '<li class="nav-item"><a class="nav-link" href="?stranica=stats">Statistika</a>
				<li class="nav-item"><a class="nav-link" href="?stranica=messages">Poruke</a>
				<li class="nav-item"><a class="nav-link" href="?stranica=addAdmin">Dodaj Admina</a>',
	'client' => '<li class="nav-item"><a class="nav-link" href="?stranica=contact">Kontakt</a>	',
	'contact' =>  array('Kontaktirajte nas',
				'Možete nam poslati e-mail i popunjavanjem formulara koji sledi:',
				'Ime i prezime:',
				'Adresa e-pošte:',
				'Naslov poruke:',
				'Unesite poruku:',
				'Unesite kod sa slike',
				'Pošaljite',
				'<address><p>+381 11 3035 401, +381 11 3035 402</p>
				<p> <a href="mailto:parking@gmail.com ">parking@gmail.com </a>| parkingsistem.rs</p>
				<p>Beograd, Srbija</p></address>'),
	'copyright' => sprintf('&copy; Autorska prava: M&T %s | Uslovi korišćenja', date('Y')),
	'info' =>  array('Nivo:','Broj slobodnih mesta:','Detaljniji prikaz'),
	'login' => '<a class="text-light nav-link pt-0 pd-0" href="?stranica=register">Registrujte se</a>
				<a class="text-light nav-link pt-0 pd-0" href="?stranica=login">Prijavite se</a>',
	'loginPage' =>  array('Prijava korisnika:','Adresa e-pošte:','Unesite adresu e-pošte','Lozinka:','Unesite lozinku','Prijavite se'),			
	'logo' => 'Parking Sistem',
	'logout' => '<a class="text-light nav-link pt-0 pd-0" href="?stranica=logout">Odjavite se</a>',
	'menu' => '<li class="nav-item"><a class="nav-link" href="?stranica=">Naslovna</a>
			   <li class="nav-item"><a class="nav-link" href="?stranica=parking&nivo=0">Parking</a>
			   <li class="nav-item"><a class="nav-link" href="?stranica=price">Cenovnik</a>',
	'parking' => array('ULAZ','IZLAZ','DOLE','GORE','ODOZDO','ODOZGO'),
	'price' => array('<h1>Cene i Popusti</h1>',
				 '<div class="col bg-primary"><strong>Tip lica</strong></div>
				<div class="col bg-primary"><strong>Usluga</strong></div>
				<div class="col bg-primary"><strong>Cena po započetom satu</strong></div>',
				'Parkiranje bez rezervacije',
				'Parkiranje sa rezervacijom'),
	'register' => array('Registracija korisnika','Tip lica:','Fizičko lice','Pravno lice','Unesite ime','Unesite prezime',
				'Unesite adresu e-pošte','Broj telefona mora da ima šablon: 063-111-888(8)','Unesite broj telefona',
				'Lozinka mora imati minimum: 8 karaktera od toga jedno malo slovo, jedno veliko, specijalni znak i broj.',
				'Unesite lozinku','Unesite ponovo lozinku','Unesite kod sa slike','Registruj se'),
	'reserve' => array('<h1>Rezervacija mesta</h1>','Registarski broj vozila:','Sprat:','Sektor:','Mesto:','Datum i vreme početka boravka:','Rezervacija','Primer'),
	'stats'  => '<h1>STATISTIKA</h1>',
	'text' => array('<h1>Garaže i parkirališta</h1>
			   <p>Parking Sistem upravlja sa jednom od najvećih javnih garaža. Korisnicima je na raspolaganju oko 400 parking mesta.</p>
			   <h3>Parkiranje u garažama</h3>
			   <p><li>Plaća se po započetom satu, dnevno (jednokratno dnevno parkiranje)</li>
			   <li>Mesečne pretplate, a u zavisnosti od toga za koji vid usluge se korisnik (fizičko ili pravno lice) odluči.</li></p>
			   <h3>Parkiranje na parkiralištima</h3>
			   <p>Plaća se po započetom satu, dnevno (jednokratno dnevno parkiranje), ali postoji i više opcija mesečne pretplate.</p>',
			   'Pogodnosti parking sistema',
			   'Jednostavna rezervacija parking mesta',
			   'Sigurnost Vašeg vozila',
			   'Real-time sistem parking mesta',
			   'Lak pristup parking mestu'),

	'type' =>  array('Fizičko','Pravno'),					
);	
	
$jezici_error = array(
	'registration' => '<h5>Registracija nije tačna!</h5>',
	'floor' 	   => '<h5>Nije izabran adekvatan sprat!</h5>',
	'sector' 	   => '<h5>Nije izabran adekvatan sektor!</h5>',
	'place'        => '<h5>Nije izabrano adekvatno mesto!</h5>',
	'date'         => '<h5>Datum i vreme nisu u dobrom formatu!</h5>',
	'reserved'     => '<h5>Mesto nije slobodno, pogledajte mapu sa slobodnim mestima!</h5>',
	'success'      => '<h5>Uspešno rezervisano mesto!</h5>',
	'error'        => '<h5>Došlo je do greške u registraciji vozila, probajte ponovo!</h5>',
	'pass'  	   => '<h5>Lozinka nije tačna!</h5>',
	'passCheck'    => '<h5>Nije uspesno potvrdjena lozinka !</h5>',
	'login'		   => '<h5>Neispravno logovanje!</h5>',
	'email'		   => '<h5>Adresa e-pošte nije tačna!</h5>',
	'forename'	   => '<h5>Ime nije tačno!</h5>',
	'surname'	   => '<h5>Prezime nije tačno!</h5>',
	'telephone'	   => '<h5>Telefon nije tačan!</h5>',
	'captcha'	   => '<h5>Uneseni kod se ne poklapa sa onim sa slike!</h5>',
	'form'		   => '<h3>Greška pri validaciji forme!</h3>',
	'regCheck'	   => '<h3>Već ste registrovani!</h3>',
	'link' 		   => '<div class="card-body"> <h4 class="card-title">Greška 404! Nemam takvu stranicu.</h4></div>',
);

?>