<?php require 'views/layout/header.php'; ?>

<h2>Înregistrare</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red"><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form method="post" action="index.php?page=register_post">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">

    <label>Username:</label><br>
    <input type="text" name="username" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Parolă:</label><br>
    <input type="password" name="password" required><br>

    <label>Confirmă parolă:</label><br>
    <input type="password" name="confirm" required><br>

    <button type="submit">Înregistrează-te</button>
</form>

<?php require 'views/layout/footer.php'; ?>
