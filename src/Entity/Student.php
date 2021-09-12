<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 * @ApiResource()
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=ClassYear::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $classyear;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $caretakerName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $caretakerPhoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $caretakerEmail;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMale;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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

    public function getClassyear(): ?ClassYear
    {
        return $this->classyear;
    }

    public function setClassyear(?ClassYear $classyear): self
    {
        $this->classyear = $classyear;

        return $this;
    }

    public function getCaretakerName(): ?string
    {
        return $this->caretakerName;
    }

    public function setCaretakerName(string $caretakerName): self
    {
        $this->caretakerName = $caretakerName;

        return $this;
    }

    public function getCaretakerPhoneNumber(): ?string
    {
        return $this->caretakerPhoneNumber;
    }

    public function setCaretakerPhoneNumber(string $caretakerPhoneNumber): self
    {
        $this->caretakerPhoneNumber = $caretakerPhoneNumber;

        return $this;
    }

    public function getCaretakerEmail(): ?string
    {
        return $this->caretakerEmail;
    }

    public function setCaretakerEmail(string $caretakerEmail): self
    {
        $this->caretakerEmail = $caretakerEmail;

        return $this;
    }

    public function getIsMale(): ?bool
    {
        return $this->isMale;
    }

    public function setIsMale(bool $isMale): self
    {
        $this->isMale = $isMale;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
