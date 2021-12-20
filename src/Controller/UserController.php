<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Adresse;
use App\Entity\Useradresse;
use App\Form\EditProfileType;
use Symfony\Component\Security\Core\Security;
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
    public function editInfo(Request $request, Security $security): Response
    {

        $user_adresse = new Useradresse();

        $user_adresse->setFirstname($security->getUser()->getFirstname());
        $user_adresse->setLastname($security->getUser()->getLastname());
        $user_adresse->setTelephone($security->getUser()->getTelephone());
        $user_adresse->setEmail($security->getUser()->getEmail());

        $adress = $this->getDoctrine()->getRepository(Adresse::class)->findOneBy(['id' => $security->getUser()->getId()]);
        $user_adresse->setNumero($adress->getNumero());
        $user_adresse->setRue($adress->getRue());
        $user_adresse->setVille($adress->getVille());
        $user_adresse->setCodePostal($adress->getCodePostal());

        $form = $this->createForm(EditProfileType::class, $user_adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $user_info = $this->getDoctrine()->getRepository(User::class)->findOneById($security->getUser()->getId());
            $user_info->setFirstname($user_adresse->getFirstname());
            $user_info->setLastname($user_adresse->getLastname());
            $user_info->setTelephone($user_adresse->getTelephone());
            $user_info->setEmail($user_adresse->getEmail());

            $update_adresse = $this->getDoctrine()->getRepository(Adresse::class)->findOneBy(['id' => $security->getUser()->getId()]);
            $update_adresse->setNumero($user_adresse->getNumero());
            $update_adresse->setRue($user_adresse->getRue());
            $update_adresse->setVille($user_adresse->getVille());
            $update_adresse->setCodePostal($user_adresse->getCodePostal());

            $em = $this->getDoctrine()->getManager();
            $em->persist($user_info, $update_adresse);
            $em->flush();
        }

        return $this->render('user/edit.html.twig', [
            'EditProfile' => $form->createView(),
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