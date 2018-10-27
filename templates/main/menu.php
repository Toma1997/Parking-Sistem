    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top">
      <div class="container">
        <a class="navbar-brand">Parking Sistem</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php if (!isset($_SESSION['CLIENT'])): ?>
              <li class="nav-item"><a class="nav-link" href="register.php">Registrujte se</a>
              <li class="nav-item"><a class="nav-link" href="login.php">Prijavite se</a>
            <?php else: ?>
              <li class="nav-item"><a class="nav-link" href="parking.php">Parking mesto</a>
			  <li class="nav-item"><a class="nav-link" href="reserve.php">Rezervišite mesto</a>
              <li class="nav-item"><a class="nav-link" href="login.php">Odjavite se</a>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
