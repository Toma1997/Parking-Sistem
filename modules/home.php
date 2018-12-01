</div>
<div class="card bg-dark text-white">
	<img src="images/parking-car.jpg" class="img-fluid card-image" style="filter: blur(1px) grayscale(60%);" alt="Parking sistem auto">
	<div class="card-img-overlay container">
		<div style="margin-left:-380px; width: 1300px;" class="row text-primary">
			<?php

			include("./core/database_wrapper.php");
			$db = new Database("parking");
			$db->Connect();
			$db->prikaziSlobodnaMesta("nivoi");

			while($row = $db->getResult()->fetch_assoc()) {
			?>
			
			<div class="col-sm-3">
				<div class="card">		
					<div class="card-header bg-white"><h3><?php echo $jezici_mapa['info'][0]; ?> <?php echo $row['Nivo']; ?> </h3></div>
					<div class="card-body">
						<h5 class="card-title"><?php echo $jezici_mapa['info'][1]; ?> <?php echo $row['Slobodna mesta']; ?></h5>
						<a href=<?php echo "?stranica=parking&nivo=".$row['Nivo']; ?> class="card-title"><?php echo $jezici_mapa['info'][2]; ?> </a>
					</div>
				</div>
			</div>
			
		<?php } ?>
		</div>
	</div>
</div>