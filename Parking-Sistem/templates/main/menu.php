    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary static-top">
      <div class="container">
        <a class="navbar-brand">Паркинг Систем</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <?php if (!isset($_SESSION['CLIENT'])): ?>
              <li class="nav-item"><a class="nav-link" href="register.php">Региструј се</a>
              <li class="nav-item"><a class="nav-link" href="login.php">Пријави се</a>
            <?php else: ?>
              <li class="nav-item"><a class="nav-link" href="tickets.php">Моји подаци</a>
              <li class="nav-item"><a class="nav-link" href="login.php">Одјави се</a>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
