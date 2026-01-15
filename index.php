<?php
session_start();

/*
 |------------------------------------------------------------
 | Configurare de bază
 |------------------------------------------------------------
 */
// require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';

/*
 |------------------------------------------------------------
 | Componente core
 |------------------------------------------------------------
 */
require_once __DIR__ . '/core/functions.php';
require_once __DIR__ . '/core/auth.php';
require_once __DIR__ . '/core/csrf.php';

/*
 |------------------------------------------------------------
 | Modele
 |------------------------------------------------------------
 */
require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/models/Competition.php';
require_once __DIR__ . '/models/Participant.php';
require_once __DIR__ . '/models/Event.php';
require_once __DIR__ . '/models/Result.php';

/*
 |------------------------------------------------------------
 | Controllere
 |------------------------------------------------------------
 */
require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/CompetitionController.php';
require_once __DIR__ . '/controllers/ParticipantController.php';
require_once __DIR__ . '/controllers/EventController.php';
require_once __DIR__ . '/controllers/ResultController.php';

/*
 |------------------------------------------------------------
 | Router
 |------------------------------------------------------------
 */
require_once __DIR__ . '/core/router.php';
