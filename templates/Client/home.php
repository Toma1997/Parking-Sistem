</div>
<div class="card bg-dark text-white">
	<img src="images/parking-car.jpg" class="img-fluid card-image" style="filter: blur(1px) grayscale(60%);" alt="Parking sistem auto">
	<div class="card-img-overlay container">
		<?php

		include("./kernel/database_wrapper.php");
		$db = new Database("parking");
		$db->Connect();
		$db->prikaziSlobodnaMesta("nivoi");

		while($row = $db->getResult()->fetch_assoc()) {
		?>
		<div class="row text-primary">
			<div class="col-sm-4">
				<div class="card">		
					<div class="card-header bg-white"><h2>Nivo: <?php echo $row['Nivo']; ?></h2></div>
						<div class="card-body">
							<h4 class="card-title">Broj slobodnih mesta: <?php echo $row['Slobodna mesta']; ?></h5>
							<a href=<?php echo "index.php?stranica=parking&nivo=".$row['Nivo']; ?> class="card-title">Detaljniji prikaz</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		
	</div>
</div>
<div class="container mt-3 .text-left ">
	<h1>Garaže i parkirališta</h1>
	<p>Parking Sistem upravlja sa jednom od najvećih javnih garaža. Korisnicima je na raspolaganju oko 400 parking mesta.</p>
	<h3>Parkiranje u garažama</h3>
	<p><li>Plaća se po započetom satu, dnevno (jednokratno dnevno parkiranje)</li>
	<li>Mesečne pretplate, a u zavisnosti od toga za koji vid usluge se korisnik (fizičko ili pravno lice) odluči.</li></p>
	<h3>Parkiranje na parkiralištima</h3>
	<p>Plaća se po započetom satu, dnevno (jednokratno dnevno parkiranje), ali postoji i više opcija mesečne pretplate.</p>
</div>
	
<div class="card text-center">
  <div class="card-body">
    <h4 class="card-title">Pogodnosti parking sistema</h4>
    <div class="row">
	  <div class="col-sm-6">
		<div class="card-body">
			<p class="card-text">Jednostavna rezervacija parking mesta</p>
		</div>
	  </div>
	  <div class="col-sm-6">
		<div class="card-body">
			<p class="card-text">Sigurnost Vašeg vozila</p>
		</div>
	  </div>
	</div>
	<div class="row">
	  <div class="col-sm-6">
		<div class="card-body">
			<p class="card-text">Real-time sistem parking mesta</p>
		</div>
	  </div>
	  <div class="col-sm-6">
		<div class="card-body">
			<p class="card-text">Lak pristup parking mestu</p>
		</div>
	  </div>
	</div>
  </div>
  
</div>