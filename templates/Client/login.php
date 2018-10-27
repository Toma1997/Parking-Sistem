<?php require_once '../main/header.php'; ?>

<div>
    <h1>Prijava korisnika</h1>
    <div class="content">
        <form method="post">
            <div class="form-group">
                <label for="email">Adresa e-pošte:</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Unesite adresu e-pošte" oninvalid="this.setCustomValidity('Popunite polje')"> 
            </div>
            <div class="form-group">
                <label for="password">Lozinka:</label>
                <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" required placeholder="Unesite Lozinku" oninvalid="this.setCustomValidity('Popunite polje')">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Prijavite se
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once '../main/footer.php'; ?>
