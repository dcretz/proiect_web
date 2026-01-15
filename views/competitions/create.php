<?php require 'views/layout/header.php'; ?>

<h2>Adaugă Concurs</h2>

<form method="post" action="index.php?page=competition_store">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">

    <label>Nume:</label><br>
    <input type="text" name="name" required><br>

    <label>Locație:</label><br>
    <input type="text" name="location" required><br>

    <label>Data start:</label><br>
    <input type="date" name="start_date" required><br>

    <label>Data sfârșit:</label><br>
    <input type="date" name="end_date" required><br>

    <label>Descriere:</label><br>
    <textarea name="description"></textarea><br>

    <button type="submit">Salvează</button>
</form>

<?php require 'views/layout/footer.php'; ?>
