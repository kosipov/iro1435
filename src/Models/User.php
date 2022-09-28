<?php

namespace Kosipov\Iro1435\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Kosipov\Iro1435\Repositories\UserRepository")
 * @ORM\Table(name="users")
 */
class User
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue */
    private int $id;

    /** @ORM\Column(type="string") */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity="\Kosipov\Iro1435\Models\Comment", mappedBy="user")
     */
    private $comments;

    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function addComments(Comment $comment): void
    {
        $this->comments[] = $comment;
    }
}