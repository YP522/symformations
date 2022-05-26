<?php

namespace App\Form;

use App\Entity\Session;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_debut',DateType::class, ['widget' => 'single_text',])
            ->add('date_fin',DateType::class, ['widget' => 'single_text',])
            ->add('nom')
            ->add('promotion')
            ->add('salle')
            ->add('formateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
