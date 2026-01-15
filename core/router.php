<?php

$page = $_GET['page'] ?? 'home';

switch ($page) {

    case 'login':
        AuthController::login();
        break;

    case 'logout':
        AuthController::logout();
        break;

    case 'register':
        AuthController::register();
        break;

    case 'login_post':
        AuthController::loginPost();
        break;

    case 'register_post':
        AuthController::registerPost();
        break;

    case 'competitions':
        requireLogin();
        CompetitionController::index();
        break;

    case 'competition_create':
        requireLogin();
        CompetitionController::create();
        break;

    case 'competition_store':
        requireLogin();
        CompetitionController::store();
        break;

    case 'competition_edit':
        requireLogin();
        CompetitionController::edit();
        break;

    case 'competition_update':
        requireLogin();
        CompetitionController::update();
        break;

    case 'competition_delete':
        requireLogin();
        CompetitionController::delete();
        break;

    case 'participants':
        requireLogin();
        ParticipantController::index();
        break;

    case 'participant_create':
        requireLogin();
        ParticipantController::create();
        break;    

    case 'participant_store':
        requireLogin();
        ParticipantController::store();
        break;

    case 'participant_edit':
        requireLogin();
        ParticipantController::edit();
        break;

    case 'participant_update':
        requireLogin();
        ParticipantController::update();
        
    case 'participant_delete':
        requireLogin();
        ParticipantController::delete();
        break;

    case 'results':
        requireLogin();
        ResultController::index();
        break;

    case 'result_create':
        requireLogin();
        ResultController::create();
        break;    

    case 'result_store':
        requireLogin();
        ResultController::store();
        break;

    case 'result_edit':
        requireLogin();
        ResultController::edit();
        break;

    case 'result_update':
        requireLogin();
        ResultController::update();
        
    case 'result_delete':
        requireLogin();
        ResultController::delete();
        break;        


    case 'events':
        requireLogin();
        EventController::index();
        break;

    case 'event_create':
        requireLogin();
        EventController::create();
        break;    

    case 'event_store':
        requireLogin();
        EventController::store();
        break;

    case 'event_edit':
        requireLogin();
        EventController::edit();
        break;

    case 'event_update':
        requireLogin();
        EventController::update();
        
    case 'event_delete':
        requireLogin();
        EventController::delete();
        break;   

    case 'home':
    default:
        require_once __DIR__ . '/../views/home.php';
        break;
}
