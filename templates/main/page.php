<?php require_once '../main/header.php'; ?>

<div>
    <h1><?php echo htmlspecialchars($Context->get('page')->title); ?></h1>
    <div class="content">
        <?php echo htmlspecialchars($Context->get('page')->content); ?>
    </div>
</div>

<?php require_once '../main/footer.php'; ?>
