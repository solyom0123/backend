<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 * @ApiResource()
 */
class Card
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $textContent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgContent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $videoContent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tags;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $soundContent;

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

    public function getTextContent(): ?string
    {
        return $this->textContent;
    }

    public function setTextContent(?string $textContent): self
    {
        $this->textContent = $textContent;

        return $this;
    }

    public function getImgContent(): ?string
    {
        return $this->imgContent;
    }

    public function setImgContent(?string $imgContent): self
    {
        $this->imgContent = $imgContent;

        return $this;
    }

    public function getVideoContent(): ?string
    {
        return $this->videoContent;
    }

    public function setVideoContent(?string $videoContent): self
    {
        $this->videoContent = $videoContent;

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(string $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getSoundContent(): ?string
    {
        return $this->soundContent;
    }

    public function setSoundContent(?string $soundContent): self
    {
        $this->soundContent = $soundContent;

        return $this;
    }
    
}
