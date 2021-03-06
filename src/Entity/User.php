<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, options={"comment":"Имя"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"comment":"Фамилия"})
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255, options={"comment":"Номер телефона"})
     */
    private $phone;

    /**
     * @ORM\Column(type="date", options={"comment":"Дата рождения"})
     */
    private $date_birth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"comment":"О себе"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, options={"comment":"сслыка в соц. сеть вк"})
     */
    private $auth_vk;

    /**
     * @ORM\Column(type="string", length=255, options={"comment":"Email"})
     */
    private $email;

    /**
     * Контактное лицо организации
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Organisation", inversedBy="users")
     */
    private $organisation;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"comment":"Стаж волонтера (сколько лет)"})
     */
    private $experience;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City")
     * @ORM\JoinColumn(nullable=false)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    public function __construct()
    {
        $this->organisation = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->date_birth;
    }

    public function setDateBirth(\DateTimeInterface $date_birth): self
    {
        $this->date_birth = $date_birth;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthVk(): ?string
    {
        return $this->auth_vk;
    }

    public function setAuthVk(string $auth_vk): self
    {
        $this->auth_vk = $auth_vk;

        return $this;
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
     * @return Collection|Organisation[]
     */
    public function getOrganisation(): Collection
    {
        return $this->organisation;
    }

    public function addOrganisation(Organisation $organisation): self
    {
        if (!$this->organisation->contains($organisation)) {
            $this->organisation[] = $organisation;
        }

        return $this;
    }

    public function removeOrganisation(Organisation $organisation): self
    {
        if ($this->organisation->contains($organisation)) {
            $this->organisation->removeElement($organisation);
        }

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?array
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

}
