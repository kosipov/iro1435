<?php

require 'index.php';

/** @var \Kosipov\Iro1435\Repositories\UserRepository $userRepository */
$userRepository = $conn->getRepository(\Kosipov\Iro1435\Models\User::class);

var_dump($userRepository->findFirstIvanByRaw());