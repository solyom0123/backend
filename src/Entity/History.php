<?php

namespace App\Entity;

use App\Repository\HistoryRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=HistoryRepository::class)
 * @ApiResource()
 */
class History
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Classroom::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $classroom;

    /**
     * @ORM\ManyToOne(targetEntity=ClassYear::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $classYear;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRelevant;

    /**
     * @ORM\ManyToOne(targetEntity=Subject::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $subject;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassroom(): ?Classroom
    {
        return $this->classroom;
    }

    public function setClassroom(?Classroom $classroom): self
    {
        $this->classroom = $classroom;

        return $this;
    }

    public function getClassYear(): ?ClassYear
    {
        return $this->classYear;
    }

    public function setClassYear(?ClassYear $classYear): self
    {
        $this->classYear = $classYear;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIsRelevant(): ?bool
    {
        return $this->isRelevant;
    }

    public function setIsRelevant(bool $isRelevant): self
    {
        $this->isRelevant = $isRelevant;

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->subject;
    }

    public function setSubject(?Subject $subject): self
    {
        $this->subject = $subject;

        return $this;
    }
}
