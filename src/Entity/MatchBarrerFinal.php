<?php

namespace App\Entity;

use App\Repository\MatchBarrerFinalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatchBarrerFinalRepository::class)
 */
class MatchBarrerFinal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Teams::class, inversedBy="matchBarrerFinals")
     */
    private $Team1;

    /**
     * @ORM\ManyToOne(targetEntity=Teams::class, inversedBy="matchBarrerFinals")
     */
    private $Team2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeam1(): ?Teams
    {
        return $this->Team1;
    }

    public function setTeam1(?Teams $Team1): self
    {
        $this->Team1 = $Team1;

        return $this;
    }

    public function getTeam2(): ?Teams
    {
        return $this->Team2;
    }

    public function setTeam2(?Teams $Team2): self
    {
        $this->Team2 = $Team2;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->Score;
    }

    public function setScore(?string $Score): self
    {
        $this->Score = $Score;

        return $this;
    }
}
