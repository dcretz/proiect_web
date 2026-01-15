<?php require 'views/layout/header.php'; ?>

<h2>Lista Concursuri</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red"><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></p>
<?php endif; ?>

<table border="1" cellpadding="5">
    <tr>
        <th>Nume</th>
        <th>Locație</th>
        <th>Data Start</th>
        <th>Data Sfârșit</th>
        <th>Detalii</th>
        
        <?php if (isLoggedIn() && $_SESSION['role'] !== 'participant'): ?>
            <th>Acțiuni</th>
        <?php endif; ?>
    </tr>
    <?php foreach ($competitions as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['location']) ?></td>
            <td><?= htmlspecialchars($c['start_date']) ?></td>
            <td><?= htmlspecialchars($c['end_date']) ?></td>
            <td><?= htmlspecialchars($c['description']) ?></td>
            <?php if (isLoggedIn() && $_SESSION['role'] !== 'participant'): ?>
                <td>
                    <a href="index.php?page=competition_edit&id=<?= $c['id_competition'] ?>">Edit</a>
                    <form method="post" action="index.php?page=competition_delete" style="display:inline">
                        <input type="hidden" name="id" value="<?= $c['id_competition'] ?>">
                        <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
                        <button type="submit" onclick="return confirm('Ștergi acest concurs?')">Delete</button>
                    </form>
                    <a href="index.php?page=events&competition_id=<?= $c['id_competition'] ?>">Evenimente </a>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

<?php require 'views/layout/footer.php'; ?>
