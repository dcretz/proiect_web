<?php require 'views/layout/header.php'; ?>

<h2>Editează probă</h2>

<form method="post" action="index.php?page=event_update">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <input type="hidden" name="id" value="<?= $event['id_event'] ?>">

    <label>Nume probă:</label><br>
    <input type="text" name="name" value="<?= e($event['name']) ?>" required><br>

    <label>Data:</label><br>
    <input type="date" name="date" value="<?= e($event['date']) ?>" required><br>

    <button type="submit">Actualizează</button>
</form>

<?php require 'views/layout/footer.php'; ?>
