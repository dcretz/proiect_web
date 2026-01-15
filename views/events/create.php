<?php require 'views/layout/header.php'; ?>

<h2>Adaugă probă pentru competiția #<?= e($_GET['competition_id']) ?></h2>

<form method="post" action="index.php?page=event_store">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <input type="hidden" name="competition_id" value="<?= e($_GET['competition_id']) ?>">

    <label>Nume probă:</label><br>
    <input type="text" name="name" required><br>

    <label>Data:</label><br>
    <input type="date" name="date" required><br>

    <button type="submit">Salvează</button>
</form>

<?php require 'views/layout/footer.php'; ?>
