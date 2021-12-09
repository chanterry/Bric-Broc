<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
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

    public function getTrancheage(): ?int
    {
        return $this->Trancheage;
    }

    public function setTrancheage(int $Trancheage): self
    {
        $this->Trancheage = $Trancheage;

        return $this;
    }
}
