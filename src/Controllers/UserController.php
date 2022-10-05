<?php

namespace Kosipov\Iro1435\Controllers;

use Doctrine\ORM\EntityManager;
use Kosipov\Iro1435\Models\User;
use Kosipov\Iro1435\Repositories\UserRepository;
use Kosipov\Iro1435\Request;

class UserController
{
    private EntityManager $entityManager;

    private UserRepository $userRepository;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $entityManager->getRepository(User::class);
    }

    public function getAllUsers()
    {
        $allUsers = $this->userRepository->findAll();

        $allUsersArray = '';

        /** @var User $allUser */
        foreach ($allUsers as $allUser) {
            $allUsersArray .=
                '<tr><td>'.$allUser->getId().'</td><td>'.$allUser->getName().'</td></tr>';
        }

        return <<<HTML
<table>
<tr>All users</tr>
{$allUsersArray}
</table>

HTML;
    }

    public function getUser(Request $request)
    {
        $user = $this->userRepository->find($request->getQuery()['id']);

        return <<<HTML
<table>
<tr>All users</tr>
<tr><td>{$user->getId()}</td><td>{$user->getId()}</td></tr>
</table>

HTML;
    }
}