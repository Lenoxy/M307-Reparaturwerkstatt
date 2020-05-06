<?php

$urgencies =  Urgency::getAll();

$tools = Tool::getAll();


require 'app/Views/create.view.php';
