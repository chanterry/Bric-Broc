<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/homepage", name="homepage")
     */
    public function category(CategorieRepository $repository, ProduitRepository $repositoryProduit): Response
    {
        return $this->render('homepage/index.html.twig', [
            'categoryList' =>  $repository->findAll(),
            'produitList' => $repositoryProduit->findAll(),
        ]);
    }
}
