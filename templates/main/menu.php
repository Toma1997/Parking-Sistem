    <!-- Navigation -->
	
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top">
      <div class="container">
        <a class="navbar-brand" href="./">Parking Sistem</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
			<li class="nav-item"><a class="nav-link" href="index.php?stranica=">Naslovna</a>
			<li class="nav-item"><a class="nav-link" href="index.php?stranica=parking">Parking</a>
          <?php if (isset($_SESSION['CLIENT'])): ?>
		  <li class="nav-item"><a class="nav-link" href="index.php?stranica=price">Cenovnik</a>
				<!--<li class="nav-item"><a class="nav-link" href="index.php?stranica=reserve">Rezervišite mesto</a>-->
            <?php endif; ?>
			<li class="nav-item"><a class="nav-link" href="index.php?stranica=contact">Kontakt</a>
        <?php if (isset($_SESSION['ADMIN'])): ?>
		  <li class="nav-item"><a class="nav-link" href="index.php?stranica=addAdmin">Dodaj Admina</a>
            <?php endif; ?>
          </ul>
      </div>
      </div>
    </nav>
