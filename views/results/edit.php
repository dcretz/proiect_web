<?php require 'views/layout/header.php'; ?>

<h2>Editează rezultat</h2>

<form method="post" action="index.php?page=result_update">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <input type="hidden" name="id" value="<?= $result['id_result'] ?>">

    <label>Participant:</label><br>
    <input type="text" value="<?= e($result['first_name']) ?> <?= e($result['last_name']) ?>" disabled><br>

    <label>Scor / Timp:</label><br>
    <input type="text" name="score" value="<?= e($result['score']) ?>" required><br>

    <button type="submit">Actualizează</button>
</form>

<?php require 'views/layout/footer.php'; ?>
