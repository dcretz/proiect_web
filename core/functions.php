<?php

// verifică dacă utilizatorul este logat
function isLoggedIn()
{
    return !empty($_SESSION['user_id']);
}

// obligă utilizatorul să fie logat; dacă nu, redirecționează
function requireLogin()
{
    if (!isLoggedIn()) {
        header("Location: index.php?page=login");
        exit;
    }
}

// verifică rolul utilizatorului
function requireRole($role)
{
    if (!isLoggedIn() || ($_SESSION['role'] ?? '') !== $role) {
        die("Acces interzis!");
    }
}

// escape pentru afișarea în HTML (XSS)
function e($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// helper redirect
function redirect($url)
{
    header("Location: $url");
    exit;
}
