<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Produit_categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $produit_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $categorie_id;

    public function setProduit_id($produitId){
        $this->produit_id = $produitId;
    }

    public function setCategorie_id($categorieId){
        $this->categorie_id = $categorieId;
    }
}
