<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parking Sistem</title>

    <!-- Bootstrap core CSS -->
	<link href="libs/bootstrap.min.css" rel="stylesheet">
	<style>
	.col {border-style: dotted;}
	</style>
  </head>
  <body>
	<div class="dark text-right small bg-primary p-0 m-0">
		<div class="container">
		<div class="btn-group">
		<?php if (!isset($_SESSION['CLIENT'])): ?>
			<a class="text-light nav-link pt-0 pd-0" href="index.php?stranica=register">Registrujte se</a>
			<a class="text-light nav-link pt-0 pd-0" href="index.php?stranica=login">Prijavite se</a>
			<?php else: ?>
			<a class="text-light nav-link pt-0 pd-0" href="index.php?stranica=logout">Odjavite se</a>
            <?php endif; ?>
		</div>
		</div>
    </div>
    <?php require_once 'menu.php'; ?>

    <!-- Page Content -->
    <div class="container">
