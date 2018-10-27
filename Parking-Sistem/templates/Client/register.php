<?php require_once '../main/header.php'; ?>

<div>
    <h1>Регистрација корисника</h1>
    <div class="content">
        <!-- < ?php if (!$Context->get('hideForm')): ?>-->
            <form method="post">
                <div class="form-group">
                    <label for="forename">Име:</label>
                    <input type="text" id="forename" name="forename" class="form-control" required placeholder="Унесите име" oninvalid="this.setCustomValidity('Попуните поље')">
                </div>
                <div class="form-group">
                    <label for="surname">Презиме:</label>
                    <input type="text" id="surname" name="surname" class="form-control" required placeholder="Унесите презиме" oninvalid="this.setCustomValidity('Попуните поље')">
                </div>
                <div class="form-group">
                    <label for="email">Адреса е-поште:</label>
                    <input type="email" id="email" name="email" class="form-control" required placeholder="Унесите адресу е-поште" oninvalid="this.setCustomValidity('Попуните поље')">
                </div>
                <div class="form-group">
                    <label for="telephone">Број телефона:</label>
                    <input type="text" id="telephone" name="telephone" class="form-control" required placeholder="Унесите број телефона" oninvalid="this.setCustomValidity('Попуните поље')">
                </div>
				<div class="form-group">
                    <label for="bank_account">Број банковног рачуна:</label>
                    <input type="text" id="bank_account" name="bank_account" class="form-control" required placeholder="Унесите број банковног рачуна" oninvalid="this.setCustomValidity('Попуните поље')">
                </div>
				<div class="form-group">
                    <label for="car">Број возила:</label>
					<input type="number" id="car" name="car"  class="form-control" required min="1" max="10" value="1" onchange="change()">
                </div>
				<div id="cars" class="form-group">
					<div class="form-group">
						<label for="type">Тип возила:</label>
						<select id="type" name="type" class="form-control" required placeholder="Одаберите тип возила" oninvalid="this.setCustomValidity('Попуните поље')">
						</select>
					</div>
					<div class="form-group">
						<label for="brand">Марка возила:</label>
						<select id="brand" name="brand" class="form-control" required oninvalid="this.setCustomValidity('Попуните поље')">
						</select>
					</div>
					<div class="form-group">
						<label for="model">Модел возила:</label>
						<select id="model" name="model" class="form-control" required  oninvalid="this.setCustomValidity('Попуните поље')">
						</select>
					</div>
					<div class="form-group">
						<label for="registration">Регистрација:</label>
						<input type="text" id="registration" name="registration" class="form-control" required oninvalid="this.setCustomValidity('Попуните поље')">
					</div>			
				</div>
				<div class="form-group">
                    <label for="password1">Лозинка:</label>
                    <input type="password" id="password1" name="password1" class="form-control" required placeholder="Унесите лозинку" oninvalid="this.setCustomValidity('Попуните поље')">
                </div>
                <div class="form-group">
                    <label for="password2">Поновите лозинку:</label>
                    <input type="password" id="password2" name="password2" class="form-control" required placeholder="Унесите поново лозинку" oninvalid="this.setCustomValidity('Попуните поље')">
                </div>
				<div class="form-group">
					<img id="captcha" class="col-sm-4 img-fluid" src="../../securimage/securimage_show.php" alt="CAPTCHA Image" />
					<input type="text" id="captcha_code" name="captcha_code" class="form-control" size="10" placeholder="Унесите код са слике" maxlength="6" required />
					
				</div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Региструјте се
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

