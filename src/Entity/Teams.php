<?php

namespace App\Entity;

use App\Repository\TeamsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=MatchGroup::class, mappedBy="Team1")
     */
    private $matchGroups;

    /**
     * @ORM\OneToMany(targetEntity=MatchBarrer::class, mappedBy="Team1")
     */
    private $Team2;

    /**
     * @ORM\OneToMany(targetEntity=MatchBarrer::class, mappedBy="Team2")
     */
    private $matchBarrers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Path;

    /**
     * @ORM\OneToMany(targetEntity=MatchBarrerFinal::class, mappedBy="Team1")
     */
    private $matchBarrerFinals;

    /**
     * @ORM\OneToMany(targetEntity=MatchBarrer::class, mappedBy="teamWinner")
     */
    private $matchBarrersWinner;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wins;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $losses;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $draws;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $goalsScored;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $goalsConceded;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $points;

    public function __construct()
    {
        $this->matchGroups = new ArrayCollection();
        $this->Team2 = new ArrayCollection();
        $this->matchBarrers = new ArrayCollection();
        $this->matchBarrerFinals = new ArrayCollection();
        $this->matchBarrersWinner = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, MatchGroup>
     */
    public function getMatchGroups(): Collection
    {
        return $this->matchGroups;
    }

    public function addMatchGroup(MatchGroup $matchGroup): self
    {
        if (!$this->matchGroups->contains($matchGroup)) {
            $this->matchGroups[] = $matchGroup;
            $matchGroup->setTeam1($this);
        }

        return $this;
    }

    public function removeMatchGroup(MatchGroup $matchGroup): self
    {
        if ($this->matchGroups->removeElement($matchGroup)) {
            // set the owning side to null (unless already changed)
            if ($matchGroup->getTeam1() === $this) {
                $matchGroup->setTeam1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MatchBarrer>
     */
    public function getTeam2(): Collection
    {
        return $this->Team2;
    }

    public function addTeam2(MatchBarrer $team2): self
    {
        if (!$this->Team2->contains($team2)) {
            $this->Team2[] = $team2;
            $team2->setTeam1($this);
        }

        return $this;
    }

    public function removeTeam2(MatchBarrer $team2): self
    {
        if ($this->Team2->removeElement($team2)) {
            // set the owning side to null (unless already changed)
            if ($team2->getTeam1() === $this) {
                $team2->setTeam1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MatchBarrer>
     */
    public function getMatchBarrers(): Collection
    {
        return $this->matchBarrers;
    }

    public function addMatchBarrer(MatchBarrer $matchBarrer): self
    {
        if (!$this->matchBarrers->contains($matchBarrer)) {
            $this->matchBarrers[] = $matchBarrer;
            $matchBarrer->setTeam2($this);
        }

        return $this;
    }

    public function removeMatchBarrer(MatchBarrer $matchBarrer): self
    {
        if ($this->matchBarrers->removeElement($matchBarrer)) {
            // set the owning side to null (unless already changed)
            if ($matchBarrer->getTeam2() === $this) {
                $matchBarrer->setTeam2(null);
            }
        }

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->Path;
    }

    public function setPath(?string $Path): self
    {
        $this->Path = $Path;

        return $this;
    }

    /**
     * @return Collection<int, MatchBarrerFinal>
     */
    public function getMatchBarrerFinals(): Collection
    {
        return $this->matchBarrerFinals;
    }

    public function addMatchBarrerFinal(MatchBarrerFinal $matchBarrerFinal): self
    {
        if (!$this->matchBarrerFinals->contains($matchBarrerFinal)) {
            $this->matchBarrerFinals[] = $matchBarrerFinal;
            $matchBarrerFinal->setTeam1($this);
        }

        return $this;
    }

    public function removeMatchBarrerFinal(MatchBarrerFinal $matchBarrerFinal): self
    {
        if ($this->matchBarrerFinals->removeElement($matchBarrerFinal)) {
            // set the owning side to null (unless already changed)
            if ($matchBarrerFinal->getTeam1() === $this) {
                $matchBarrerFinal->setTeam1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MatchBarrer>
     */
    public function getMatchBarrersWinner(): Collection
    {
        return $this->matchBarrersWinner;
    }

    public function addMatchBarrersWinner(MatchBarrer $matchBarrersWinner): self
    {
        if (!$this->matchBarrersWinner->contains($matchBarrersWinner)) {
            $this->matchBarrersWinner[] = $matchBarrersWinner;
            $matchBarrersWinner->setTeamWinner($this);
        }

        return $this;
    }

    public function removeMatchBarrersWinner(MatchBarrer $matchBarrersWinner): self
    {
        if ($this->matchBarrersWinner->removeElement($matchBarrersWinner)) {
            // set the owning side to null (unless already changed)
            if ($matchBarrersWinner->getTeamWinner() === $this) {
                $matchBarrersWinner->setTeamWinner(null);
            }
        }

        return $this;
    }

    public function getWins(): ?int
    {
        return $this->wins;
    }

    public function setWins(?int $wins): self
    {
        $this->wins = $wins;

        return $this;
    }

    public function getLosses(): ?int
    {
        return $this->losses;
    }

    public function setLosses(?int $losses): self
    {
        $this->losses = $losses;

        return $this;
    }

    public function getDraws(): ?int
    {
        return $this->draws;
    }

    public function setDraws(?int $draws): self
    {
        $this->draws = $draws;

        return $this;
    }

    public function getGoalsScored(): ?int
    {
        return $this->goalsScored;
    }

    public function setGoalsScored(?int $goalsScored): self
    {
        $this->goalsScored = $goalsScored;

        return $this;
    }

    public function getGoalsConceded(): ?int
    {
        return $this->goalsConceded;
    }

    public function setGoalsConceded(?int $goalsConceded): self
    {
        $this->goalsConceded = $goalsConceded;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }
}
