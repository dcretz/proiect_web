<?php
require_once __DIR__ . '/../models/Competition.php';
require_once __DIR__ . '/../core/csrf.php';
require_once __DIR__ . '/../core/auth.php';

class CompetitionController
{
    public static function index()
    {
        requireLogin(); // verifică dacă utilizatorul e autentificat
        $competitions = Competition::getAll();
        require __DIR__ . '/../views/competitions/list.php';
    }

    public static function create()
    {
        requireLogin();
        $token = generateCSRFToken(); // pentru protecție CSRF
        require __DIR__ . '/../views/competitions/create.php';
    }

    public static function store()
    {
        requireLogin();
        csrfCheck(); // verifică token-ul CSRF

        // validare simplă
        $name = trim($_POST['name'] ?? '');
        $location = trim($_POST['location'] ?? '');
        $start_date = $_POST['start_date'] ?? '';
        $end_date = $_POST['end_date'] ?? '';
        $description = trim($_POST['description'] ?? '');

        if ($name && $location && $start_date && $end_date) {
            Competition::create([
                'name' => $name,
                'location' => $location,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'description' => $description
            ]);
            header("Location: index.php?page=competitions");
            exit;
        } else {
            $_SESSION['error'] = "Toate câmpurile obligatorii trebuie completate!";
            header("Location: index.php?page=competition_create");
            exit;
        }
    }

    public static function edit()
    {
        requireLogin();
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?page=competitions");
            exit;
        }
        $competition = Competition::getById($id);
        $token = generateCSRFToken();
        require __DIR__ . '/../views/competitions/edit.php';
    }

    public static function update()
    {
        requireLogin();
        csrfCheck();

        $id = $_POST['id'] ?? null;
        if (!$id) {
            header("Location: index.php?page=competitions");
            exit;
        }

        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'location' => trim($_POST['location'] ?? ''),
            'start_date' => $_POST['start_date'] ?? '',
            'end_date' => $_POST['end_date'] ?? '',
            'description' => trim($_POST['description'] ?? '')
        ];

        Competition::update($id, $data);
        header("Location: index.php?page=competitions");
        exit;
    }

    public static function delete()
    {
        requireLogin();
        csrfCheck();

        $id = $_POST['id'] ?? null;
        if ($id) {
            Competition::delete($id);
        }
        header("Location: index.php?page=competitions");
        exit;
    }
}
