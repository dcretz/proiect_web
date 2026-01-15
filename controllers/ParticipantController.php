<?php
require_once __DIR__ . '/../models/Participant.php';
require_once __DIR__ . '/../core/csrf.php';
require_once __DIR__ . '/../core/functions.php';

class ParticipantController
{
    public static function index()
    {
        requireLogin();
        $participants = Participant::getAll();
        require __DIR__ . '/../views/participants/list.php';
    }

    public static function create()
    {
        requireLogin();
        $token = generateCSRFToken();
        require __DIR__ . '/../views/participants/create.php';
    }

    public static function store()
    {
        requireLogin();
        csrfCheck();

        $data = [
            'first_name' => trim($_POST['first_name'] ?? ''),
            'last_name' => trim($_POST['last_name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'phone' => trim($_POST['phone'] ?? '')
        ];

        if ($data['first_name'] && $data['last_name'] && $data['email']) {
            Participant::create($data);
            header("Location: index.php?page=participants");
            exit;
        } else {
            $_SESSION['error'] = "Completati toate câmpurile obligatorii!";
            header("Location: index.php?page=participant_create");
            exit;
        }
    }

    public static function edit()
    {
        requireLogin();
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?page=participants");
            exit;
        }
        $participant = Participant::getById($id);
        $token = generateCSRFToken();
        require __DIR__ . '/../views/participants/edit.php';
    }

    public static function update()
    {
        requireLogin();
        csrfCheck();

        $id = $_POST['id'] ?? null;
        if (!$id) {
            header("Location: index.php?page=participants");
            exit;
        }

        $data = [
            'first_name' => trim($_POST['first_name'] ?? ''),
            'last_name' => trim($_POST['last_name'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'phone' => trim($_POST['phone'] ?? '')
        ];

        Participant::update($id, $data);
        header("Location: index.php?page=participants");
        exit;
    }

    public static function delete()
    {
        requireLogin();
        csrfCheck();

        $id = $_POST['id'] ?? null;
        if ($id) {
            Participant::delete($id);
        }
        header("Location: index.php?page=participants");
        exit;
    }
}
