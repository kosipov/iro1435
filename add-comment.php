<?php

require 'index.php';

$user = new \Kosipov\Iro1435\Models\User();

$user->setName('Ivan Ivanov');

/** @var \Doctrine\ORM\EntityManager $conn */
$conn->persist($user);
$conn->flush();

echo "User with " . $user->getId() . ' successful created';

$comment = new \Kosipov\Iro1435\Models\Comment();
$comment->setText('Комментарий');
$comment->setUser($user->getId());

$conn->persist($comment);
$conn->flush();

var_dump($user->getComments());