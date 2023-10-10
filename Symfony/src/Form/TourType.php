<?php

namespace App\Form;

use App\Entity\Tour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Patients;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class TourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('appointmentTime')
            ->add('isCompleted')
            ->add('patient', EntityType::class, [
                'class' => Patients::class,
            ])
            ->add('isUrgent', TextType::class, [
                'label'    => 'Transmission Urgente',
                'required' => false,
            ]);
            
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tour::class,
        ]);
    }
}
