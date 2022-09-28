<?php
require 'vendor/autoload.php';
require 'bootstrap.php';

$router = new \Kosipov\Iro1435\Routing\Router(new \Kosipov\Iro1435\Request());
$userController = new \Kosipov\Iro1435\Controllers\UserController($conn);
$router->get('/', function () {
    return <<<HTML
 <h1>HELLO</h1>
HTML;
});
$router->get('/users', fn() => $userController->getAllUsers());
$router->get('/users/get', fn(\Kosipov\Iro1435\Request $request) => $userController->getUser($request));


/*$userController = new \Kosipov\Iro1435\Controllers\UserController($conn);*/

/*
$user = new \Kosipov\Iro1435\Models\User();
$user->setName('test');

$conn->persist($user);
$conn->flush();*/