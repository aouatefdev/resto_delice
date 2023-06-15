<?php

namespace App\Entity;

use App\Entity\Plats;
use App\Entity\Commandes;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandeItemRepository;


#[ORM\Entity(repositoryClass: CommandeItemRepository::class)]
class CommandeItem 
{
    #[ORM\Id] 
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity:"App\Entity\Commandes", inversedBy:"commandeItems", cascade:['persist'])]
    #[ORM\JoinColumn(name: "commandes_id", referencedColumnName: "id", nullable: false)]
    private $commandes;

    #[ORM\ManyToOne(targetEntity:"App\Entity\Plats")]
    #[ORM\JoinColumn(nullable:false)]    
    private $plats;

    #[ORM\Column] 
    private ?int $quantite;

    #[ORM\Column(type:"string")]
    private $platsNom;

    #[ORM\Column(type:"float")]
    private $platsPrix;

    public function getId(): string
    {
        return $this->commandes->getId() . '_' . $this->plats->getId();
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPlats(): ?Plats
    {
        return $this->plats;
    }

    public function setPlats(?Plats $plats): self
    {
        $this->plats = $plats;

        return $this;
    }

    public function getCommandes(): ?Commandes
    {
        return $this->commandes;
    }

    public function setCommandes(?Commandes $commandes): self
    {
        $this->commandes = $commandes;

        return $this;
    }

    public function getPlatsNom(): ?string
    {
        return $this->platsNom;
    }

    public function setPlatsNom(string $platsNom): self
    {
        $this->platsNom = $platsNom;

        return $this;
    }

    public function getPlatsPrix(): ?float
    {
        return $this->platsPrix;
    }

    public function setPlatsPrix(float $platsPrix): self
    {
        $this->platsPrix = $platsPrix;

        return $this;
    }

}

