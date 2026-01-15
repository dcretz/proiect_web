<?php
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../core/csrf.php';
require_once __DIR__ . '/../core/functions.php';

class EventController
{
    public static function index()
    {
        requireLogin();
        $competition_id = $_GET['competition_id'] ?? null;
        if (!$competition_id) {
            die("ID competiție lipsă!");
        }

        $events = Event::getAllByCompetition($competition_id);
        require __DIR__ . '/../views/events/list.php';
    }

    public static function create()
    {
        requireLogin();
        $competition_id = $_GET['competition_id'] ?? null;
        if (!$competition_id) {
            die("ID competiție lipsă!");
        }

        $token = generateCSRFToken();
        require __DIR__ . '/../views/events/create.php';
    }

    public static function store()
    {
        requireLogin();
        csrfCheck();

        $competition_id = $_POST['competition_id'] ?? null;
        $name = trim($_POST['name'] ?? '');
        $date = $_POST['date'] ?? '';

        if ($competition_id && $name && $date) {
            Event::create([
                'competition_id' => $competition_id,
                'name' => $name,
                'date' => $date
            ]);
            header("Location: index.php?page=events&competition_id=$competition_id");
            exit;
        } else {
            $_SESSION['error'] = "Toate câmpurile sunt obligatorii!";
            header("Location: index.php?page=event_create&competition_id=$competition_id");
            exit;
        }
    }

    public static function edit()
    {
        requireLogin();
        $id = $_GET['id'] ?? null;
        if (!$id) die("ID probă lipsă!");

        $event = Event::getById($id);
        $token = generateCSRFToken();
        require __DIR__ . '/../views/events/edit.php';
    }

    public static function update()
    {
        requireLogin();
        csrfCheck();

        $id = $_POST['id'] ?? null;
        $name = trim($_POST['name'] ?? '');
        $date = $_POST['date'] ?? '';

        if ($id && $name && $date) {
            Event::update($id, ['name' => $name, 'date' => $date]);
            $event = Event::getById($id);
            header("Location: index.php?page=events&competition_id={$event['competition_id']}");
            exit;
        }
    }

    public static function delete()
    {
        requireLogin();
        csrfCheck();

        $id = $_POST['id'] ?? null;
        if ($id) {
            $event = Event::getById($id);
            Event::delete($id);
            header("Location: index.php?page=events&competition_id={$event['competition_id']}");
            exit;
        }
    }
}
