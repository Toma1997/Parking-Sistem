<?php require_once '../main/header.php'; ?>

<div>
    <h1>Registracija korisnika</h1>
    <div class="content">
        <!-- < ?php if (!$Context->get('hideForm')): ?>-->
            <form method="post">
                <div class="form-group">
                    <label for="forename">Ime:</label>
                    <input type="text" id="forename" name="forename" class="form-control" required placeholder="Unesite ime" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
                <div class="form-group">
                    <label for="surname">Prezime:</label>
                    <input type="text" id="surname" name="surname" class="form-control" required placeholder="Unesite prezime" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
                <div class="form-group">
                    <label for="email">Adresa e-pošte:</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="Unesite adresu e-pošte" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
                <div class="form-group">
                    <label for="telephone">Broj telefona:</label>
                    <input type="text" id="telephone" name="telephone" class="form-control" required placeholder="Unesite broj telefona" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
				<div class="form-group">
                    <label for="bank_account">Broj bankovnog računa:</label>
                    <input type="text" id="bank_account" name="bank_account" class="form-control" required placeholder="Unesite broj bankovnog računa" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
				<div class="form-group">
                    <label for="car">Broj vozila:</label>
					<input type="number" id="car" name="car"  class="form-control" required min="1" max="10" value="1" onchange="change()">
                </div>
				<div id="cars" class="form-group">
					<div class="form-group">
						<label for="type">Tip vozila:</label>
						<select id="type" name="type" class="form-control" required placeholder="Odaberite tip vozila" oninvalid="this.setCustomValidity('Popunite polje')">
						</select>
					</div>
					<div class="form-group">
						<label for="brand">Marka vozila:</label>
						<select id="brand" name="brand" class="form-control" required oninvalid="this.setCustomValidity('Popunite polje')">
						</select>
					</div>
					<div class="form-group">
						<label for="model">Model vozila:</label>
						<select id="model" name="model" class="form-control" required  oninvalid="this.setCustomValidity('Popunite polje')">
						</select>
					</div>
					<div class="form-group">
						<label for="registration">Registracija:</label>
						<input type="text" id="registration" name="registration" class="form-control" required oninvalid="this.setCustomValidity('Popunite polje')">
					</div>			
				</div>
				<div class="form-group">
                    <label for="password1">Lozinka:</label>
                    <input type="password" id="password1" name="password1" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required placeholder="Unesite lozinku" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
                <div class="form-group">
                    <label for="password2">Ponovite lozinku:</label>
                    <input type="password" id="password2" name="password2" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required placeholder="Unesite ponovo lozinku" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
				<div class="form-group">
					<img id="captcha" class="col-sm-4 img-fluid" src="../../securimage/securimage_show.php" alt="CAPTCHA Image" />
					<input type="text" id="captcha_code" name="captcha_code" class="form-control" size="10" placeholder="Unesite kod sa slike" maxlength="6" required />
					
				</div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Registrujte se
                    </button>
                </div>
            </form>
        <!--< ?php endif; ?>
        <p>
            < ?php echo htmlspecialchars($Context->get('message')); ?>
        </p>-->
    </div>
</div><!--
<script>
	var form = document.getElementById("cars").cloneNode(true);
function change() {

	var x = document.getElementById("car").value;
	var cars = document.getElementById("add")[0];
	
	for (var i=0;i<=x;i++) {
		cars.appendChild(form);
	}
	
}
</script>-->
<?php require_once '../main/footer.php'; ?>

