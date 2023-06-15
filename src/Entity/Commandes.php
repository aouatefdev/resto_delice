<?php

namespace App\Entity;


use App\Entity\Plats;
use App\Entity\User;
use DateTimeImmutable;
use App\Entity\CommandeItem;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



#[ORM\Entity(repositoryClass: CommandesRepository::class)]
#[Vich\Uploadable]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'commandes', cascade:['persist'])]
    private ?User $user = null;
    
    #[ORM\Column]
    private ?DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?float $montantTotal = null;

    #[ORM\OneToMany(mappedBy: 'commandes', targetEntity: Plats::class)]
    private Collection $plats;

    #[ORM\Column]
    private ?int $totalQtt = null;

    #[ORM\OneToMany(mappedBy: 'commandes', targetEntity: CommandeItem::class, cascade: ['persist', 'remove'])]
    private Collection $commandeItems; 


    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable();
        $this->plats = new ArrayCollection();
        $this->commandeItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getMontantTotal(): ?float
    {
        return $this->montantTotal;
    }

    public function setMontantTotal(float $montantTotal): self
    {
        $this->montantTotal = $montantTotal;

        return $this;
    }


    /**
     * @return Collection<int, Plats>
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(Plats $plat): self
    {
        if (!$this->plats->contains($plat)) {
            $this->plats->add($plat);
            $plat->setCommandes($this);
        }

        return $this;
    }

    public function removePlat(Plats $plat): self
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getCommandes() === $this) {
                $plat->setCommandes(null);
            }
        }

        return $this;
    }

    public function getTotalQtt(): ?int
    {
        return $this->totalQtt;
    }

    public function setTotalQtt(int $totalQtt): self
    {
        $this->totalQtt = $totalQtt;

        return $this;
    }

    /**
     * @return Collection<int, CommandeItem>
     */
    public function getCommandeItems(): Collection
    {
        return $this->commandeItems;
    }

    public function addCommandeItem(CommandeItem $commandeItem): self
    {
        if (!$this->commandeItems->contains($commandeItem)) {
            $this->commandeItems->add($commandeItem);
            $commandeItem->setCommandes($this);
        }

        return $this;
    }

    public function removeCommandeItem(CommandeItem $commandeItem): self
    {
        if ($this->commandeItems->removeElement($commandeItem)) {
            // set the owning side to null (unless already changed)
            if ($commandeItem->getCommandes() === $this) {
                $commandeItem->setCommandes(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return 'Commande ID: ' . $this->getId();
    }

}
