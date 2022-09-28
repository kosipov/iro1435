<?php

require __DIR__ . '/../index.php';

\Doctrine\ORM\Tools\Console\ConsoleRunner::run(
    new \Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider($conn)
);