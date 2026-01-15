<?php require 'views/layout/header.php'; ?>

<h2>Rezultate probă #<?= e($_GET['event_id']) ?></h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Participant</th>
        <th>Scor / Timp</th>
        <th>Acțiuni</th>
    </tr>
    <?php foreach ($results as $r): ?>
        <tr>
            <td><?= e($r['first_name']) ?> <?= e($r['last_name']) ?></td>
            <td><?= e($r['score']) ?></td>
            <td>
                <a href="index.php?page=result_edit&id=<?= $r['id_result'] ?>">Edit</a>
                <form method="post" action="index.php?page=result_delete" style="display:inline">
                    <input type="hidden" name="id" value="<?= $r['id_result'] ?>">
                    <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
                    <button type="submit" onclick="return confirm('Ștergi acest rezultat?')">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="index.php?page=result_create&event_id=<?= e($_GET['event_id']) ?>">Adaugă rezultat</a>

<?php require 'views/layout/footer.php'; ?>
