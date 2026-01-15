<?php
require_once __DIR__ . '/../models/Competition.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../models/Result.php';
require_once __DIR__ . '/../core/functions.php';

class ExportController
{
    public static function resultsCSV()
    {
        requireLogin();

        $event_id = $_GET['event_id'] ?? null;
        if (!$event_id) die("ID probă lipsă!");

        $results = Result::getAllByEvent($event_id);

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="results_event_'.$event_id.'.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Participant', 'Scor / Timp']);

        foreach ($results as $r) {
            fputcsv($output, [$r['first_name'].' '.$r['last_name'], $r['score']]);
        }

        fclose($output);
        exit;
    }
}
