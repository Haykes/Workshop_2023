<?php

namespace App\Form;

use App\Entity\Patients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TelType;


class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('lastname', TextType::class)
        ->add('firstname', TextType::class)
        ->add('address', TextType::class, ['required' => false]) // Champ facultatif
        ->add('postcode', TextType::class, ['required' => false]) 
        ->add('city', TextType::class, ['required' => false]) 
        ->add('information', TextareaType::class, ['required' => false]) // Champ facultatif
        ->add('phone', TelType::class, ['required' => false]); // Champ facultatif

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patients::class,
        ]);
    }
}
