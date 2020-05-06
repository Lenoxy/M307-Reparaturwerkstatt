<?php
require_once 'app/Models/Assignment.php';
require_once 'app/Models/Tool.php';
require_once 'app/Models/Urgency.php';

$urgencies =  Urgency::getAll();

$tools = Tool::getAll();



require 'app/Views/create.view.php';
