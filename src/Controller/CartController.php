<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Adresse;
use App\Form\CartFormType;
use App\Form\CartAddressType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\Mime\Address;

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
    public function cart_account(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(CartFormType::class, $user);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
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
        $form = $this->createForm(CartAddressType::class, $address);
        $form ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($address);
            $em->flush();
        }
        
        return $this->render('cart/address.html.twig', [
            'CartAddressType' => $form->createView(),
        ]);
    }
}
