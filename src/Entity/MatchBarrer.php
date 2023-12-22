<?php

namespace App\Entity;

use App\Repository\MatchBarrerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatchBarrerRepository::class)
 */
class MatchBarrer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Teams::class, inversedBy="Team2")
     */
    private $Team1;

    /**
     * @ORM\ManyToOne(targetEntity=Teams::class, inversedBy="matchBarrers")
     */
    private $Team2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Score;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $winner;

  

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

    public function getStage(): ?string
    {
        return $this->stage;
    }

    public function setStage(?string $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function setWinner(string $winner): self
    {
        $this->winner = $winner;

        return $this;
    }


    
}
