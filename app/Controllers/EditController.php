<?php

require_once 'app/Controllers/ValidationHandleController.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form uses GET the first time. After
    $id = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];
    $assignment = Assignment::getById($id);

    $tools = Tool::getAll();

    require 'app/Views/edit.view.php';
}





