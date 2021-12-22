<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */

    public function produit(Request $request, ProduitRepository $repository, CategorieRepository $repositoryCategorie): Response
    {
        //var_dump($request->get('btn'));

        if ($request->get('btn') != null) {
            $produits = $repository->createQueryBuilder('p')
                ->join('p.categorie', 'c')
                ->where('c.id = :category_id')
                ->setParameter('category_id', $request->get('btn'))
                ->getQuery()->getResult();
        } else {
            $produits = $repository->findAll();
        }

        return $this->render('produit/produits.html.twig', [
            'produits' => $produits,
            'listCategory' => $repositoryCategorie->findAll(),

        ]);
    }

    /**
     * @Route("/details-{id}", name="produitdetails")
     */

    public function details($id, ProduitRepository $repository): Response
    {

        return $this->render('produit/details.html.twig', [
            'details' => $repository->find($id),
        ]);
    }
}
