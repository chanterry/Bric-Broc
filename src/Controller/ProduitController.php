<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    
    public function produit( ProduitRepository $repository ): Response
    {
        
        return $this->render('produit/produits.html.twig', [
            'produits' => $repository->findAll(),
        ]);
    }

    /**
     * @Route("/details-{id}", name="produitdetails")
     */
    
    public function details($id, ProduitRepository $repository ): Response
    {
        
        return $this->render('produit/details.html.twig', [
            'details' => $repository->find($id),
        ]);
    }

    /**
     * @Route("/produit_bdd/{keyword}", name="produit_bdd")
     */

     public function produit_bdd($keyword)
     {
        $product = $this->getDoctrine()->getRepository(Produit::class)->createQueryBuilder('p')
        ->where('p.Nom LIKE :nom')
        ->setParameter ("nom", "%". $keyword ."%")
        ->getQuery()
        ->getResult();

        return $this->render(
            
        );
     }
}
