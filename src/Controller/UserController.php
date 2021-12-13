<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'Bienvenue à la connexion',
        ]);
    }

    /**
     * @Route("/confirmation_inscription", name="confirmation_inscription")
     */
    public function inscription(): Response
    {
        return $this->render('user/confirmation_inscription.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    
}
