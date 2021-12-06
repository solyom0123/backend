<?php

namespace App\Entity;

use App\Repository\GamesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=GamesRepository::class)
 * @ApiResource()

 */
class Games
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
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $jsCode;

    /**
     * @ORM\Column(type="text")
     */
    private $htmlCode;

    /**
     * @ORM\Column(type="text")
     */
    private $cssCode;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getJsCode()
    {
        return $this->jsCode;
    }

    public function setJsCode($jsCode): self
    {
        $this->jsCode = $jsCode;

        return $this;
    }

    public function getHtmlCode()
    {
        return $this->htmlCode;
    }

    public function setHtmlCode($htmlCode): self
    {
        $this->htmlCode = $htmlCode;

        return $this;
    }

    public function getCssCode()
    {
        return $this->cssCode;
    }

    public function setCssCode($cssCode): self
    {
        $this->cssCode = $cssCode;

        return $this;
    }

}
