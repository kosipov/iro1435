<?php

require 'vendor/autoload.php';

$config = \Doctrine\ORM\ORMSetup::createAnnotationMetadataConfiguration(array(__DIR__."/src/Models"), true);

$conn = [
    'driver' => 'pdo_mysql',
    'host' => '185.164.172.184',
    'user' => '1435_usr',
    'password' => '14351435',
    'dbname' => '1435'
];

/** @var \Doctrine\ORM\EntityManager $conn */
$conn = \Doctrine\ORM\EntityManager::create($conn, $config);
