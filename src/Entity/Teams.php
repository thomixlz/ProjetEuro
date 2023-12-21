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

    public function __construct()
    {
        $this->matchGroups = new ArrayCollection();
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
}
