<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Adresse;
use App\Form\CartFormType;
use App\Form\CartAddressType;
use Symfony\Component\Security\Core\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(): Response
    {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }

    /**
     * @Route("/account", name="account")
     */
    public function cart_account(Request $request, Security $security): Response
    {
        $user_coordonnes = new User();

        $user_coordonnes->setFirstname($security->getUser()->getFirstname());
        $user_coordonnes->setLastname($security->getUser()->getLastname());
        $user_coordonnes->setEmail($security->getUser()->getEmail());
        $user_coordonnes->setTelephone($security->getUser()->getTelephone());

        $form = $this->createForm(CartFormType::class, $user_coordonnes);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user_coordonnes);
            $em->flush();
        }
        
        return $this->render('cart/account.html.twig', [
            'CartForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/address", name="cart_address")
     */
    public function cart_address(Request $request): Response
    {

        $address = new Adresse();
        $addresUser = $this->getDoctrine()->getRepository(Adresse::class)->findOneBy(['user' => $this->getUser()->getId()]);
        if($addresUser != null){
            $address = $addresUser;
        }

        $form = $this->createForm(CartAddressType::class, $address);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $address->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();

            return $this->redirectToRoute('edit'); 
        }
        
        return $this->render('cart/address.html.twig', [
            'CartAddressType' => $form->createView(),
        ]);
    }

    /**
     * @Route("/validation", name="validation")
     */
    public function validation(): Response
    {
        return $this->render('cart/validation.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }
}
