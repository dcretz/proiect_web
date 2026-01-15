<?php require 'views/layout/header.php'; ?>

<h2>Login</h2>

<?php if (!empty($_SESSION['error'])): ?>
    <p style="color:red"><?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form method="post" action="index.php?page=login_post">
    <input type="hidden" name="csrf_token" value="<?= $token ?>">
    <label>Username:</label><br>
    <input type="text" name="username" required><br>
    <label>Parolă:</label><br>
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
    <p>Nu ai cont? <a href="index.php?page=register">Înregistrează-te</a></p>
</form>


<?php require 'views/layout/footer.php'; ?>
