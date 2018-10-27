<?php require_once '../main/header.php'; ?>

<div>
    <h1>Пријава корисника</h1>
    <div class="content">
        <form method="post">
            <div class="form-group">
                <label for="email">Име/Регистарска таблица:</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="Унесите Име/Регистарску таблицу" oninvalid="this.setCustomValidity('Попуните поље')"> 
            </div>
            <div class="form-group">
                <label for="password">Лозинка:</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="Унесите лозинку" oninvalid="this.setCustomValidity('Попуните поље')">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Пријавите се
                </button>
            </div>
        </form>
    </div>
</div>

<?php require_once '../main/footer.php'; ?>
