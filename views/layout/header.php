<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Sports Competition Manager</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<header>
    <h1>Sports Competition Manager</h1>
    <h2>
        <!-- <?php echo $_SESSION['role'] ?> -->
    </h2>
    <nav>
        <a href="index.php?page=competitions">Concursuri</a>
        <?php if (isLoggedIn() && $_SESSION['role'] !== 'participant'): ?>

            <a href="index.php?page=competition_create">Adaugă Concurs</a>
        <?php endif; ?>
        <a href="index.php?page=participants">Participanti</a>
        
        <?php if (isLoggedIn()): ?>
            <a href="index.php?page=logout">Logout</a>
        <?php else: ?>
            <a href="index.php?page=login">Login</a>
        <?php endif; ?>
    </nav>
</header>
<main>
