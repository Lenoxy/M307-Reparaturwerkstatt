<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $urgencyId = htmlspecialchars($_POST['urgency']);
    $toolId = htmlspecialchars($_POST['tool']);



    $a = new Assignment(
        null,
        $name,
        $email,
        $phone,
        0,
        Urgency::getById($urgencyId),
        Tool::getById($toolId),
        date('YYYY-mm-dd')
    );

    $errors = $a->validate();

    if($errors){
        require 'app/Controllers/CreateController.php';
    }else{
        $a->create();
        // Redirect to list view
        header("Location: ./?v=30");
    }

}
