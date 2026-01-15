<?php require 'views/layout/header.php'; ?>

<h2>Trimite notificare</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red"><?= e($_SESSION['error']); unset($_SESSION['error']); ?></p>
<?php endif; ?>

<?php if (!empty($_SESSION['success'])): ?>
    <p style="color:green"><?= e($_SESSION['success']); unset($_SESSION['success']); ?></p>
<?php endif; ?>

<form method="post" action="index.php?page=send_email">
    <label>Email destinatar:</label><br>
    <input type="email" name="email" required><br>

    <label>Subiect:</label><br>
    <input type="text" name="subject" required><br>

    <label>Mesaj:</label><br>
    <textarea name="message" rows="5" required></textarea><br>

    <button type="submit">Trimite</button>
</form>

<?php require 'views/layout/footer.php'; ?>
