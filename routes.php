<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/ShowController.php',
    'list' => 'app/Controllers/ShowController.php',
    'create' => 'app/Controllers/CreateController.php',
    'edit' => 'app/Controllers/EditController.php',

    'handle-create' => 'app/Controllers/HandleCreateController.php',
    'handle-edit' => 'app/Controllers/HandleEditController.php'
]);
