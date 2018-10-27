<?php require_once '../main/header.php'; ?>

<div>
    <h1>Rezervacija mesta</h1>
    <div class="content">
        <form method="post">
			<div class="form-group">
				<label for="registration">Registracija:</label>
				<input type="text" id="registration" name="registration" class="form-control" required oninvalid="this.setCustomValidity('Popunite polje')">
			</div>			
            <div class="form-group">
                <label for="floor">Sprat:</label>
                <input type="text" id="floor" name="floor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sector">Sektor:</label>
                <input type="text" id="sector" name="sector" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="place">Mesto:</label>
                <input type="text" id="place" name="place" class="form-control" required>
            </div>
			<div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Rezervacija
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once '../main/footer.php'; ?>
