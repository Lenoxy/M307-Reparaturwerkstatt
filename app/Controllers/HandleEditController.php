<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $toolId = htmlspecialchars($_POST['tool']);
    $state = htmlspecialchars($_POST['state']);
    $id = htmlspecialchars($_POST['id']);

    $a = Assignment::getById($id);

    $a->name = $name;
    $a->email = $email;
    $a->phone = $phone;
    $a->tool = Tool::getById($toolId);
    $a->state = $state;

    $errors = $a->validate();

    if ($errors) {
        require 'app/Controllers/EditController.php';
    } else {
        $a->update();
        header("Location: ./?v=30");
    }
}