<?php
require_once __DIR__ . '/../config/database.php';

class User
{
    public static function getByUsername($username)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public static function create($data)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            INSERT INTO users (username, email, password, role)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['username'],
            $data['email'],
            $data['password'],
            $data['role']
        ]);
    }
}
