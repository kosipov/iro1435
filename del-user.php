<?php

require 'index.php';

$userService = new \Kosipov\Iro1435\Services\UserService($conn);
$user = $conn->getRepository(\Kosipov\Iro1435\Models\User::class)->find(5);
$userService->deleteUser($user);
