<?php

require 'index.php';

$userService = new \Kosipov\Iro1435\Services\UserService($conn);
$user = $userService->createUser('new User');

echo "User with " . $user->getId() .' successful created';
