<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 * @UniqueEntity(fields={"password"}, message="password already existe")
 */
class User implements UserInterface
{


    public const ROLE_CANDIDAT = 'ROLE_CANDIDAT';
    public const ROLE_RECRETEUR = 'ROLE_RECRETEUR';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;


    private $plainPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Get creative and think of a title!")
     */
    private $lastName;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Offre", mappedBy="user")
     */
    private $offres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Training", mappedBy="user")
     */
    private $training;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Experience", mappedBy="user")
     */
    private $exprience;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Skill", inversedBy="users")
     */
    private $skilles;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $postalCode;



    public function __construct()
    {
        $this->offres = new ArrayCollection();
        $this->training = new ArrayCollection();
        $this->exprience = new ArrayCollection();
        $this->skilles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }




    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }


    /**
     * @return Collection|Offre[]
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offre $offre): self
    {
        if (!$this->offres->contains($offre)) {
            $this->offres[] = $offre;
            $offre->setUser($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->offres->contains($offre)) {
            $this->offres->removeElement($offre);
            // set the owning side to null (unless already changed)
            if ($offre->getUser() === $this) {
                $offre->setUser(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|Training[]
     */
    public function getTraining(): Collection
    {
        return $this->training;
    }

    public function addTraining(Training $training): self
    {
        if (!$this->training->contains($training)) {
            $this->training[] = $training;
            $training->setUser($this);
        }

        return $this;
    }

    public function removeTraining(Training $training): self
    {
        if ($this->training->contains($training)) {
            $this->training->removeElement($training);
            // set the owning side to null (unless already changed)
            if ($training->getUser() === $this) {
                $training->setUser(null);
            }
        }

        return $this;
    }



    /**
     * @return Collection|Experience[]
     */
    public function getExprience(): Collection
    {
        return $this->exprience;
    }

    public function addExprience(Experience $exprience): self
    {
        if (!$this->exprience->contains($exprience)) {
            $this->exprience[] = $exprience;
            $exprience->setUser($this);
        }

        return $this;
    }

    public function removeExprience(Experience $exprience): self
    {
        if ($this->exprience->contains($exprience)) {
            $this->exprience->removeElement($exprience);
            // set the owning side to null (unless already changed)
            if ($exprience->getUser() === $this) {
                $exprience->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkilles(): Collection
    {
        return $this->skilles;
    }

    public function addSkille(Skill $skille): self
    {
        if (!$this->skilles->contains($skille)) {
            $this->skilles[] = $skille;
        }

        return $this;
    }

    public function removeSkille(Skill $skille): self
    {
        if ($this->skilles->contains($skille)) {
            $this->skilles->removeElement($skille);
        }

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }


    public function __toString()
    {
        return $this->getEmail()?:$this->getFirstName()?:$this->getLastName();
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }




}
