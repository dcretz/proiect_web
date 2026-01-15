<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../core/csrf.php';

class AuthController
{
    public static function login()
    {
        if (isLoggedIn()) {
            header("Location: index.php?page=competitions");
            exit;
        }

        $token = generateCSRFToken();
        require __DIR__ . '/../views/auth/login.php';
    }

    public static function loginPost()
    {
        csrfCheck();

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$username || !$password) {
            $_SESSION['error'] = "Completați toate câmpurile!";
            header("Location: index.php?page=login");
            exit;
        }

        $user = User::getByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['role'] = $user['role'];
            header("Location: index.php?page=competitions");
            exit;
        } else {
            $_SESSION['error'] = "Date invalide!";
            header("Location: index.php?page=login");
            exit;
        }
    }

    public static function logout()
    {
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }

    public static function register()
    {
        $token = generateCSRFToken();
        require __DIR__ . '/../views/auth/register.php';
    }

    public static function registerPost()
    {
        csrfCheck();

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm'] ?? '';

        if (!$username || !$email || !$password || !$confirm) {
            $_SESSION['error'] = "Completați toate câmpurile!";
            header("Location: index.php?page=register");
            exit;
        }

        if ($password !== $confirm) {
            $_SESSION['error'] = "Parolele nu coincid!";
            header("Location: index.php?page=register");
            exit;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        User::create([
            'username' => $username,
            'email' => $email,
            'password' => $hash,
            'role' => 'participant' // rol default
        ]);

        $_SESSION['success'] = "Cont creat cu succes!";
        header("Location: index.php?page=login");
        exit;
    }
}
