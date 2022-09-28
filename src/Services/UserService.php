<?php

namespace Kosipov\Iro1435\Services;

use Kosipov\Iro1435\Models\User;

class UserService
{
    private \Doctrine\ORM\EntityManager $entityManager;

    /**
     * @param \Doctrine\ORM\EntityManager $entityManager
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createUser(string $name): \Kosipov\Iro1435\Models\User
    {
        $user = new \Kosipov\Iro1435\Models\User();
        $user->setName($name);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

    public function deleteUser(User $user): void
    {
        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }
}