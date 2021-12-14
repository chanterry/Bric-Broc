<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/edit", name="edit")
     */
    public function editInfo(UserInterface $userinterface, Request $request): Response
    {
        $form = $this->createForm(RegistrationFormType::class, $userinterface);
        $form->handleRequest($request);

        return $this->render('user/edit.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    public function editAddress(UserInterface $userinterface, Request $request): Response
    {
        $form = $this->createForm(RegistrationFormType::class, $userinterface);
        $form->handleRequest($request);

        return $this->render('user/edit.html.twig', [
            'registrationForm' => $form->createView(),
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
