<?php

// generează token CSRF și îl salvează în sesiune
function generateCSRFToken()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// verifică token CSRF trimis în formular
function csrfCheck()
{
    $token = $_POST['csrf_token'] ?? '';
    if (empty($token) || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
        die("Token CSRF invalid!");
    }
}
