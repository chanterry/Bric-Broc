<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $Typedejouet;

    /**
     * @ORM\Column(type="integer")
     */
    private $Trancheage;

    /**
     * @ORM\ManyToMany(targetEntity=Produit::class, mappedBy="categorie")
     */
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypedejouet(): ?string
    {
        return $this->Typedejouet;
    }

    public function setTypedejouet(string $Typedejouet): self
    {
        $this->Typedejouet = $Typedejouet;

        return $this;
    }

    public function getTrancheage(): ?string
    {
        return $this->Trancheage;
    }

    public function setTrancheage(string $Trancheage): self
    {
        $this->Trancheage = $Trancheage;

        return $this;
    }

    /**
     * @return Collection|Produit[]
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->addCategorie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            $produit->removeCategorie($this);
        }

        return $this;
    }
}
