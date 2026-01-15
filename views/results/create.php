<?php require 'views/layout/header.php'; ?>

<h2>Adaugă rezultat pentru probă #<?= e($_GET['event_id']) ?></h2>

<form method="post" action="index.php?page=result_store">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <input type="hidden" name="event_id" value="<?= e($_GET['event_id']) ?>">

    <label>Participant:</label><br>
    <select name="participant_id" required>
        <?php foreach ($participants as $p): ?>
            <option value="<?= $p['id_participant'] ?>"><?= e($p['first_name']) ?> <?= e($p['last_name']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Scor / Timp:</label><br>
    <input type="text" name="score" required><br>

    <button type="submit">Salvează</button>
</form>

<?php require 'views/layout/footer.php'; ?>
