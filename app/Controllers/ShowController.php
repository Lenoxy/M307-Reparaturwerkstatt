<?php

$assignments = Assignment::getAll();

$assignmentsReady = [];

foreach ($assignments as $a) {
    if ($a->state == 0) {
        $dateNow = new DateTime('now');
        $dateThen = date_add(new DateTime($a->createdAt), date_interval_create_from_date_string($a->urgency->daysNeeded . 'days'));
        $date = $dateThen->format('d.m.Y');
        $status = $dateThen > $dateNow;
        $editLink = 'edit?id=' . $a->assignmentId;
        $assignmentsReady[] = ['name' => $a->name, 'werkzeug' => $a->tool->name, 'abgeschlossen' => $date, 'status' => $status, 'edit' => $editLink];
    }
}

require 'app/Views/show.view.php';
