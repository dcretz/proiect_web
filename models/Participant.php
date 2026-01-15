<?php
require_once __DIR__ . '/../config/database.php';

class Participant
{
    public static function getAll()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM participants ORDER BY last_name, first_name");
        return $stmt->fetchAll();
    }

    public static function getById($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM participants WHERE id_participant = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function create($data)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            INSERT INTO participants (first_name, last_name, email, phone)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['phone']
        ]);
    }

    public static function update($id, $data)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            UPDATE participants
            SET first_name = ?, last_name = ?, email = ?, phone = ?
            WHERE id_participant = ?
        ");
        return $stmt->execute([
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['phone'],
            $id
        ]);
    }

    public static function delete($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM participants WHERE id_participant = ?");
        return $stmt->execute([$id]);
    }
}
