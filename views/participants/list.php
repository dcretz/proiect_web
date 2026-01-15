<?php require 'views/layout/header.php'; ?>

<h2>Lista Participanți</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red"><?= e($_SESSION['error']); unset($_SESSION['error']); ?></p>
<?php endif; ?>

<table border="1" cellpadding="5">
    <tr>
        <th>Prenume</th>
        <th>Nume</th>
        <th>Email</th>
        <th>Telefon</th>
        <?php if (isLoggedIn() && $_SESSION['role'] !== 'participant'): ?>
            <th>Acțiuni</th>
        <?php endif; ?>
    </tr>
    <?php foreach ($participants as $p): ?>
        <tr>
            <td><?= e($p['first_name']) ?></td>
            <td><?= e($p['last_name']) ?></td>
            <td><?= e($p['email']) ?></td>
            <td><?= e($p['phone']) ?></td>
            <?php if (isLoggedIn() && $_SESSION['role'] !== 'participant'): ?>
                
                <td>
                    <a href="index.php?page=participant_edit&id=<?= $p['id_participant'] ?>">Edit</a>
                    <form method="post" action="index.php?page=participant_delete" style="display:inline">
                        <input type="hidden" name="id" value="<?= $p['id_participant'] ?>">
                        <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
                        <button type="submit" onclick="return confirm('Ștergi acest participant?')">Delete</button>
                    </form>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>
<?php if (isLoggedIn() && $_SESSION['role'] !== 'participant'): ?>

    <a href="index.php?page=participant_create">Adaugă Participant</a>
<?php endif; ?>

<?php require 'views/layout/footer.php'; ?>
