<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


function login($user) {
    $_SESSION['user'] = $user;
}

function logout() {
    session_destroy();
}
