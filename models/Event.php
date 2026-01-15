<?php
require_once __DIR__ . '/../config/database.php';

class Event
{
    public static function getAllByCompetition($competition_id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM events WHERE competition_id = ? ORDER BY date");
        $stmt->execute([$competition_id]);
        return $stmt->fetchAll();
    }

    public static function create($data)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            INSERT INTO events (competition_id, name, date)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([
            $data['competition_id'],
            $data['name'],
            $data['date']
        ]);
    }

    public static function getById($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM events WHERE id_event = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public static function update($id, $data)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            UPDATE events SET name = ?, date = ? WHERE id_event = ?
        ");
        return $stmt->execute([
            $data['name'],
            $data['date'],
            $id
        ]);
    }

    public static function delete($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM events WHERE id_event = ?");
        return $stmt->execute([$id]);
    }
}
