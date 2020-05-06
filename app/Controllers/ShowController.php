<?php
require_once 'app/Models/Assignment.php';
require_once 'app/Models/Tool.php';
require_once 'app/Models/Urgency.php';

$assignments = Assignment::getAll();

$assignmentsReady = [];

foreach ($assignments as $a){
    $due = (int )$a->createdAt + $a->urgency->daysNeeded;
    $status = $a->createdAt < date('YYYY-MM-dd');
    $editLink = 'edit?id=' . $a->assignmentId;
    $assignmentsReady[] = ['name' => $a->name, 'werkzeug' => $a->tool->name, 'abgeschlossen' => $due, 'status' => $status, 'edit' => $editLink];
}

require 'app/Views/show.view.php';
