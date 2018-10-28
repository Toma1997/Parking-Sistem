<?php require_once '../main/header.php'; ?>

<div>
    <h1>Registracija korisnika</h1>
    <div class="content">
        <!-- < ?php if (!$Context->get('hideForm')): ?>-->
            <form method="post">
				<div class="form-group">
                    <label for="client_type">Tip lica:</label>
					<div class="custom-control custom-radio">
					  <input type="radio" class="custom-control-input" id="individual" value="individual" name="client_type" checked>
					  <label class="custom-control-label" for="individual">Fizičko lice</label>
					</div>
					<div class="custom-control custom-radio">
					  <input type="radio" class="custom-control-input" id ="business" value="business" name="client_type">
					  <label class="custom-control-label" for="business">Pravno lice</label>
					</div>
                </div>
                <div class="form-group">
                    <label for="forename">Ime:</label>
                    <input type="text" id="forename" name="forename" class="form-control" required placeholder="Unesite ime primer Marko" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
                <div class="form-group">
                    <label for="surname">Prezime:</label>
                    <input type="text" id="surname" name="surname" class="form-control" required placeholder="Unesite prezime primer Marković" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
                <div class="form-group">
                    <label for="email">Adresa e-pošte:</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="Unesite adresu e-pošte primer marko.markovic@gmail.com" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
                <div class="form-group">
                    <label for="telephone">Broj telefona:</label>
                    <input type="text" id="telephone" name="telephone" class="form-control" pattern="+[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="Unesite broj telefona primer 063-111-2345" oninvalid="this.setCustomValidity('Popunite polje')">
                </div>
				<!-- Proveri da li nam treba bolje, mozda samo kao brojac
				<div class="form-group">
                    <label for="car">Broj vozila:</label>
					<input type="number" id="car" name="car"  class="form-control" required min="1" max="10" value="1">
                </div>-->
				<div id="registration">
				<div id="reg" class="form-group">
					<label for="registration1">Registracija:</label>
					<input type="text" id="registration1" name="registration1" class="form-control" required placeholder="Unesite broj registarske tablice primer BG111SD" oninvalid="this.setCustomValidity('Popunite polje')">
				</div>	
				</div>
				<div class="form-group">
					<button class="btn btn-outline-secondary" type="button" onclick="add()">Dodaj vozilo</button>
					<button class="btn btn-outline-secondary" type="button" onclick="remove()">Ukloni vozilo</button>
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
</div>
 <script src="../../libs/reg.js"></script>
<?php require_once '../main/footer.php'; ?>

