<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ToysFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 6; $i++) {
                $categorie = new Categorie();
                $categorie->setTypedejouet ('Type de Jouet'. $i);
                $categorie->setTrancheage ('Tranche Age'. $i);

                $manager->persist($categorie);

                $this->addReference('Categorie'. $i, $categorie);
        }  

        $u = 0;
        for ($i = 0; $i < 100; $i++) {
            if($u == 5){
                $u = 0;
            }
                $produit = new Produit();
                $produit->setNom ('Jouet'. $i);
                $produit->setMarque ('Marque'. $i);
                $produit->setPhoto ('Photo'. $i);
                $produit->setDisponibilite (true);
                $produit->addCategorie ($this->getReference('Categorie'. $u));
                $u++;
                $manager->persist($produit);
        }    

        $manager->flush();
    }
}
