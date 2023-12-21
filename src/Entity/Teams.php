<?php

namespace App\Entity;

use App\Repository\TeamsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamsRepository::class)
 */
class Teams
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rankFifa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Chapeau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(?string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getRankFifa(): ?int
    {
        return $this->rankFifa;
    }

    public function setRankFifa(?int $rankFifa): self
    {
        $this->rankFifa = $rankFifa;

        return $this;
    }

    public function getChapeau(): ?string
    {
        return $this->Chapeau;
    }

    public function setChapeau(?string $Chapeau): self
    {
        $this->Chapeau = $Chapeau;

        return $this;
    }
}
