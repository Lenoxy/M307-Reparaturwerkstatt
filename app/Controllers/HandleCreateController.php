<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $urgency = htmlspecialchars($_POST['urgency']);
    $tool = htmlspecialchars($_POST['tool']);

    //TODO: Validierung

    new Assignment( , )


}
