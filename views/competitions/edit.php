<?php require 'views/layout/header.php'; ?>

<h2>Editează Concurs</h2>

<form method="post" action="index.php?page=competition_update">
    <input type="hidden" name="id" value="<?= $competition['id_competition'] ?>">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">

    <label>Nume:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($competition['name']) ?>" required><br>

    <label>Locație:</label><br>
    <input type="text" name="location" value="<?= htmlspecialchars($competition['location']) ?>" required><br>

    <label>Data start:</label><br>
    <input type="date" name="start_date" value="<?= $competition['start_date'] ?>" required><br>

    <label>Data sfârșit:</label><br>
    <input type="date" name="end_date" value="<?= $competition['end_date'] ?>" required><br>

    <label>Descriere:</label><br>
    <textarea name="description"><?= htmlspecialchars($competition['description']) ?></textarea><br>

    <button type="submit">Actualizează</button>
</form>

<?php require 'views/layout/footer.php'; ?>
