
<div>
    <h1>Poruke</h1>
	<form method="post">
	
            <div class="form-group-sm">
                <label for="name">Ime i prezime korisnika:</label>
                <?php //IZ baze ili kako god izvuci ime i prezime korisnika?>
            </div>
			<div class="form-group-sm">
                <label for="email">Adresa e-pošte korisnika:</label>
                <?php //IZ baze ili kako god izvuci email korisnika?>
            </div>
			<div class="form-group-sm">
                <label for="title">Naslov poruke i poruka:</label>
                <?php //IZ baze ili kako god izvuci naziv i poruku korisnika?>
            </div>
            <div class="form-group-sm">
				<label for="message">Odgovor:</label>
				<textarea id="message" name="message"class="form-control" rows="4" required></textarea>
			</div>
		    <div class="form-group-sm mt-2">
                <button type="submit" class="btn btn-primary">
                    Pošaljite
                </button>
            </div>
		</form>
</div>

