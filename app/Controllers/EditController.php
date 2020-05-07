<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form uses GET the first time. After the validation fails, the ID is transmitted via POST.
    $id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : htmlspecialchars($_POST['id']);

    $assignment = Assignment::getById($id);

    $tools = Tool::getAll();

    require 'app/Views/edit.view.php';
}
