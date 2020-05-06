<?php
require 'app/Models/Assignment.php';
require 'app/Models/Tool.php';
require 'app/Models/Urgency.php';



$assignments = Assignment::getAll();


require 'app/Views/show.view.php';
