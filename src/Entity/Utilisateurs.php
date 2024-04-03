<?php

namespace App\Entity;

use App\Repository\UtilisateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateursRepository::class)]
class Utilisateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Villes $ville_id = null;

    #[ORM\Column(length: 255)]
    private ?string $profession = null;

    #[ORM\Column(length: 255)]
    private ?string $intro = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Groupes::class, inversedBy: 'utilisateurs')]
    private Collection $Groupes_id;

    public function __construct()
    {
        $this->Groupes_id = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getVilleId(): ?Villes
    {
        return $this->ville_id;
    }

    public function setVilleId(?Villes $ville_id): static
    {
        $this->ville_id = $ville_id;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getIntro(): ?string
    {
        return $this->intro;
    }

    public function setIntro(string $intro): static
    {
        $this->intro = $intro;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Groupes>
     */
    public function getGroupesId(): Collection
    {
        return $this->Groupes_id;
    }

    public function addGroupesId(Groupes $groupesId): static
    {
        if (!$this->Groupes_id->contains($groupesId)) {
            $this->Groupes_id->add($groupesId);
        }

        return $this;
    }

    public function removeGroupesId(Groupes $groupesId): static
    {
        $this->Groupes_id->removeElement($groupesId);

        return $this;
    }
}
