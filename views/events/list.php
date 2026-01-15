<?php require 'views/layout/header.php'; ?>

<h2>Lista Probe pentru Competitia #<?= e($_GET['competition_id']) ?></h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red"><?= e($_SESSION['error']); unset($_SESSION['error']); ?></p>
<?php endif; ?>

<table border="1" cellpadding="5">
    <tr>
        <th>Nume probă</th>
        <th>Data</th>
        <th>Acțiuni</th>
    </tr>
    <?php foreach ($events as $e): ?>
        <tr>
            <td><?= e($e['name']) ?></td>
            <td><?= e($e['date']) ?></td>
            <td>
                <a href="index.php?page=event_edit&id=<?= $e['id_event'] ?>">Edit</a>
                <form method="post" action="index.php?page=event_delete" style="display:inline">
                    <input type="hidden" name="id" value="<?= $e['id_event'] ?>">
                    <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
                    <button type="submit" onclick="return confirm('Ștergi această probă?')">Delete</button>
                </form>
                <a href="index.php?page=results&event_id=<?= $e['id_event'] ?>">Vezi Rezultate</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="index.php?page=event_create&competition_id=<?= e($_GET['competition_id']) ?>">Adaugă probă</a>

<?php require 'views/layout/footer.php'; ?>
