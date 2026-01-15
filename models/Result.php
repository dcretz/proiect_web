<?php
require_once __DIR__ . '/../config/database.php';

class Result
{
    public static function getAllByEvent($event_id)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT r.*, p.first_name, p.last_name 
            FROM results r 
            JOIN participants p ON r.participant_id = p.id_participant
            WHERE r.event_id = ? ORDER BY r.score ASC
        ");
        $stmt->execute([$event_id]);
        return $stmt->fetchAll();
    }

    public static function create($data)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            INSERT INTO results (participant_id, event_id, score)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([
            $data['participant_id'],
            $data['event_id'],
            $data['score']
        ]);
    }

    public static function update($id, $data)
    {
        global $pdo;
        $stmt = $pdo->prepare("
            UPDATE results SET score = ? WHERE id_result = ?
        ");
        return $stmt->execute([
            $data['score'],
            $id
        ]);
    }

    public static function delete($id)
    {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM results WHERE id_result = ?");
        return $stmt->execute([$id]);
    }
}
