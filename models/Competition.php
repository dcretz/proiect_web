<?php
require_once __DIR__ . '/../config/database.php';

class Competition
{
    public static function getAll()
    {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM competitions ORDER BY start_date DESC");
        return $stmt->fetchAll();
    }

    public static function getById($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM competitions WHERE id_competition = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function create($data)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            INSERT INTO competitions (name, location, start_date, end_date, description)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['name'],
            $data['location'],
            $data['start_date'],
            $data['end_date'],
            $data['description']
        ]);
    }

    public static function update($id, $data)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            UPDATE competitions
            SET name = ?, location = ?, start_date = ?, end_date = ?, description = ?
            WHERE id_competition = ?
        ");
        return $stmt->execute([
            $data['name'],
            $data['location'],
            $data['start_date'],
            $data['end_date'],
            $data['description'],
            $id
        ]);
    }

    public static function delete($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM competitions WHERE id_competition = ?");
        return $stmt->execute([$id]);
    }
}
