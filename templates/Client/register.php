
<div>
    <h1>Registracija korisnika</h1>
    <div class="content">
        <!-- < ?php if (!$Context->get('hideForm')): ?>-->
            <form action="/Parking-Sistem/kernel/register_validation.php" method="post">
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
					<!--<label class="font-weight-light for="forename">Ime:</label>-->
                    <input type="text" id="forename" name="forename" class="form-control" value="<?php echo $forename ?? '';?>" pattern="[A-Z][a-z]{1,32}" required placeholder="Unesite ime ">
                </div>
                <div class="form-group">
                    <!--<label class="font-weight-light for="surname">Prezime:</label>-->
                    <input type="text" id="surname" name="surname" class="form-control" value="<?php echo $surname ?? '';?>" pattern="[A-Z][a-z]{1,32}" required placeholder="Unesite prezime">
                </div>
                <div class="form-group">
                    <!--<label for="email">Adresa e-pošte:</label>-->
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $email ?? '';?>"  required placeholder="Unesite adresu e-pošte">					
                </div>
                <div class="form-group">
					<label class="font-weight-light" for="telephone">Broj telefona mora da ima šablon: 063-111-8888</label>
                    <!--<label for="telephone">Broj telefona:</label>-->
                    <input type="text" id="telephone" name="telephone" class="form-control" value="<?php echo $telephone ?? '';?>" pattern="\d{3}[\-]\d{3,4}[\-]\d{3,4}" required placeholder="Unesite broj telefona">
                </div>
				<!-- Proveri da li nam treba bolje, mozda samo kao brojac
				<div class="form-group">
                    <label for="car">Broj vozila:</label>
					<input type="number" id="car" name="car"  class="form-control" required min="1" max="10" value="1">
                </div>-->
				<!--<div class="form-group">
					<label for="registration">Registracija:</label>
					<textarea class="form-control" rows="5" maxlength="9" id="registration" name="registration " required placeholder="Unesite broj ili brojeve registarske tablice"></textarea>
					<label class="font-weight-light" for="telephone">Unesite jednu ili više registarskih tablica šablona: BG111SD. Svaku u posebnom redu</label>
				</div>	-->
				<div class="form-group">
					<label class="font-weight-light" for="telephone">Lozinka mora imati minimum: 8 karaktera od toga jedno malo slovo, jedno veliko, specijalni znak i broj.</label>
                    <!--<label for="password1">Lozinka:</label>-->
                    <input type="password" id="password1" name="password1" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required placeholder="Unesite lozinku">
                </div>
                <div class="form-group">
                    <!--<label for="password2">Ponovite lozinku:</label>-->
                    <input type="password" id="password2" name="password2" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required placeholder="Unesite ponovo lozinku">
                </div>
				<div class="form-group">
					<img id="captcha" class="col-sm-4 img-fluid" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
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
<!-- Proveriti za oninvalid ne radi kako treba
 oninvalid="this.setCustomValidity('Popunite polje')">
