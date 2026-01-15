<?php
require_once __DIR__ . '/../models/Result.php';
require_once __DIR__ . '/../models/Participant.php';
require_once __DIR__ . '/../core/csrf.php';
require_once __DIR__ . '/../core/functions.php';

class ResultController
{
    public static function index()
    {
        requireLogin();
        $event_id = $_GET['event_id'] ?? null;
        if (!$event_id) die("ID probă lipsă!");

        $results = Result::getAllByEvent($event_id);
        require __DIR__ . '/../views/results/list.php';
    }

    public static function create()
    {
        requireLogin();
        $event_id = $_GET['event_id'] ?? null;
        if (!$event_id) die("ID probă lipsă!");

        $participants = Participant::getAll();
        $token = generateCSRFToken();
        require __DIR__ . '/../views/results/create.php';
    }

    public static function store()
    {
        requireLogin();
        csrfCheck();

        $event_id = $_POST['event_id'] ?? null;
        $participant_id = $_POST['participant_id'] ?? null;
        $score = $_POST['score'] ?? null;

        if ($event_id && $participant_id && $score !== null) {
            Result::create([
                'event_id' => $event_id,
                'participant_id' => $participant_id,
                'score' => $score
            ]);
            header("Location: index.php?page=results&event_id=$event_id");
            exit;
        }
    }

    public static function edit()
    {
        requireLogin();
        $id = $_GET['id'] ?? null;
        if (!$id) die("ID rezultat lipsă!");

        $participants = Participant::getAll();
        $result = Result::getById($id);
        $token = generateCSRFToken();
        require __DIR__ . '/../views/results/edit.php';
    }

    public static function update()
    {
        requireLogin();
        csrfCheck();

        $id = $_POST['id'] ?? null;
        $score = $_POST['score'] ?? null;
        if ($id && $score !== null) {
            Result::update($id, ['score' => $score]);
            $result = Result::getById($id);
            header("Location: index.php?page=results&event_id={$result['event_id']}");
            exit;
        }
    }

    public static function delete()
    {
        requireLogin();
        csrfCheck();

        $id = $_POST['id'] ?? null;
        if ($id) {
            $result = Result::getById($id);
            Result::delete($id);
            header("Location: index.php?page=results&event_id={$result['event_id']}");
            exit;
        }
    }
}
