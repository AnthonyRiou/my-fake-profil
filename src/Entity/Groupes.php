<?php

namespace App\Entity;

use App\Repository\GroupesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupesRepository::class)]
class Groupes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: Utilisateurs::class, mappedBy: 'Groupes_id')]
    private Collection $utilisateurs;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateurs>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateurs $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->addGroupesId($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateurs $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            $utilisateur->removeGroupesId($this);
        }

        return $this;
    }
}
