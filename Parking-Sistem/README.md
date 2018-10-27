# Parking-Sistem


# Projektni zadatak
Opis projektnog zadatka
Kroz projektni zadatak treba izraditi informacioni sistem u formi web aplikacije koja će da sadrži sledeće elemente:

# I deo projekta
Struktura ekrana
Navigacija
Ograničenje prava pristupa informacijama u skladu sa ovlašćenjima korisnika
Aplikacija treba da ima najmanje dva korisnička nivoa
Anonimus
Administrator
Korisnik se identifikuje putem login obrasca unošenjem korisničkog imena i lozinke
Prikupljanje podataka
Ručni unos putem web obrazaca i/ili
Automatizovani unos podataka dostupnih preko mreže ili interneta
Skladištenje i čuvanje podataka na disku i/ili u bazi podataka
# II deo projekta
Statistička obrada i prikaz podataka
Import i/ili eksport informacija u XML formatu

# Tema projektnog zadatka
Studenti samostalno biraju temu projektnog zadatka u skladu sa svojim zaposlenjem i interesovanjima.
Tema se prijavljuje slanjem maila sa spiskom članova tima na adresu mdobrojevic [at] singidunum.ac.rs
Realizacija projektnog zadatka
Projekat se realizuje u timovima od 2 ili 3 studenta.
Projekat se realizuje u formi web aplikacije
Za izradu projekta, koristiti sledeće tehnologije:
Backend
PHP programski jezik
Baza podataka MySQL/MariaDB
Frontend
HTML
CSS
JavaScript
Ostale napomene
Ukoliko se prikupljeni podaci čuvaju na disku, smestiti ih u zaseban direktorijum. Pristup fajlovima u ovom direktorijumu preko web pretraživača mora biti zabranjen.
U slučaju poziva nepostojeće stranice, prikazati odgovarajuću poruku (Greška 404)
Ukoliko sistem radi sa slikama ili drugim multimedijalnim dokumentima, čuvati ih u zasebnim direktorijumima.
Za izradu projekta možete koristiti sopstveni kod, delove koda sa predavanja ili već gotov kod. Ono što morate znati, jeste da objasnite/odbranite šta upotrebljeni kod radi, da li je moglo drugačije rešenje i eventualno kakvo?


# Projekat GARAZA (PARKING SISTEM)

Opis modela baze
U fajlu model.doc

Opis projekta
Arhitektura:	
Frontend (HTML5, CSS3, JavaScript, jQuery, Bootstrap)
-	Korisnicki interfejs (Korisnik, Administrator)
o	Registracija i logovanje
o	Rezervacija parking mesta
o	Placanje elektronski ?
o	Pregled cena i popusta ?
o	Prikaz slobodnih mesta
Backend (PHP7, MySQL, AJAX, XML, JSON)
SERVER Xamp ili Wamp

-	Sloj logike aplikacije
o	Provera za registraciju i logovanje sa bazom
o	Provera mesta za praking kod rezervacije
o	Kreiranje racuna i izvrsenje transakcije placanja 
o	Izvestaj o cenama i popustima
o	Izvestaj slobodnih parking mesta

Baza Podataka (DBMS – MySQL 5.6)
	Tabele:
-	Korisnici (Clients)
-	Vozila (Cars)
-	Termini (Appointments)
-	Parking Mesta (Places)
-	Popusti (Discounts)

Logistika sistema:
-	Korisnik se registruje ako nema nalog, ako ima uloguje se
-	Korisnik moze prilikom registracije prijaviti se kao vlasnik 1 ili vise vozila
-	Korisnik moze rezervisati odredjeno parking mesto koje je on odabrao, pod uslovom da je slobodno
-	Za rezervaciju se stavlja od kad ce odredjeno mesto biti zauzeto
-	Na jedno parking mesto se kroz vreme moze parkirati vise vozila, svaki termin se belezi u bazi
-	Placanje se vrsi elektronski i automatski nakon sto korisnik napusti parking mesto 
-	Transakcija se obracunava u tom trenutku
-	Ako se odredjeno vozilo nije parkiralo vise od 3 meseca, podatak se brise iz baze radi manjeg opterecenja
-	Nakon prvog puta sto je korinsik parkirao pa posle mesec dana koliko je 1 ili vise vozila tog korisnika provelo sati na parkingu
o	Ako je proveo vise od 100 sati korisnik dobija popust od 20% sledeci mesec 
o	Vise od 120 dobija 30%

