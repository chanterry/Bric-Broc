<?php

namespace App\Controller;

use App\Entity\Produit;
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

        //var_dump($request->get('btnMarque'));

        if ($request->get('btn') != null) {
            $produits = $repository->createQueryBuilder('p')
                ->join('p.categorie', 'c')
                ->where('c.id = :category_id')
                ->setParameter('category_id', $request->get('btn'))
                ->getQuery()->getResult();
        } elseif ($request->get('btnMarque') != null) {
            $produits = $repository->findBy(['Marque' => $request->get('btnMarque')]);
        } else {
            $produits = $repository->findAll();
        }

        $marque = $repository->createQueryBuilder('p')
            ->select('p.Marque')
            ->groupBy('p.Marque')
            ->getQuery()->getResult();

        return $this->render('produit/produits.html.twig', [
            'produits' => $produits,
            'listCategory' => $repositoryCategorie->findAll(),
            'marque' => $marque,

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

    /**
     * @Route("/produit_bdd/{keyword}", name="produit_bdd")
     */

    public function produit_bdd($keyword)
    {
        $product = $this->getDoctrine()->getRepository(Produit::class)->createQueryBuilder('p')
            ->where('p.Nom LIKE :nom')
            ->setParameter("nom", "%" . $keyword . "%")
            ->getQuery()
            ->getResult();

        $newTab = [];

        foreach ($product as $row) {
            array_push($newTab, ["nom" => $row->getNom(), "id" => $row->getId()]);
        }
        echo json_encode($newTab);
        die();
    }
}
