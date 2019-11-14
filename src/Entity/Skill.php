<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $skille;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $expertise;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="skilles")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkille(): ?string
    {
        return $this->skille;
    }

    public function setSkille(string $skille): self
    {
        $this->skille = $skille;

        return $this;
    }

    public function getExpertise(): ?string
    {
        return $this->expertise;
    }

    public function setExpertise(string $expertise): self
    {
        $this->expertise = $expertise;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addSkille($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeSkille($this);
        }

        return $this;
    }
}
