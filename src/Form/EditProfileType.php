<?php

namespace App\Form;

use App\Entity\Useradresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('email')
            ->add('password')
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
            ])
            ->add('Numero',)
            ->add('Rue')
            ->add('Ville')
            ->add('Codepostal', TextType::class, [
                'label' => 'Code Postal',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Useradresse::class,
        ]);
    }
}
