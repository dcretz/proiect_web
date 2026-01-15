<?php require 'views/layout/header.php'; ?>

<h2>Adaugă Participant</h2>

<form method="post" action="index.php?page=participant_store">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">

    <label>Prenume:</label><br>
    <input type="text" name="first_name" required><br>

    <label>Nume:</label><br>
    <input type="text" name="last_name" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Telefon:</label><br>
    <input type="text" name="phone"><br>

    <button type="submit">Salvează</button>
</form>

<?php require 'views/layout/footer.php'; ?>
