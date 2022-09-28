<?php

use Kosipov\Iro1435\UserRepository;

require 'index.php';

$user = new \Kosipov\Iro1435\Models\User();

$repository = $conn->getRepository(\Kosipov\Iro1435\Models\User::class);

var_dump($repository->findAaaaa());