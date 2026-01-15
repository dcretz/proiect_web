<?php require 'views/layout/header.php'; ?>

<h2>Editează Participant</h2>

<form method="post" action="index.php?page=participant_update">
    <input type="hidden" name="id" value="<?= $participant['id_participant'] ?>">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">

    <label>Prenume:</label><br>
    <input type="text" name="first_name" value="<?= e($participant['first_name']) ?>" required><br>

    <label>Nume:</label><br>
    <input type="text" name="last_name" value="<?= e($participant['last_name']) ?>" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" value="<?= e($participant['email']) ?>" required><br>

    <label>Telefon:</label><br>
    <input type="text" name="phone" value="<?= e($participant['phone']) ?>"><br>

    <button type="submit">Actualizează</button>
</form>

<?php require 'views/layout/footer.php'; ?>
