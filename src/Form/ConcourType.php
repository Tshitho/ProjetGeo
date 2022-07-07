<?php

namespace App\Form;

use App\Entity\Concour;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ConcourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('uplaod',FileType::class, [
                'label' => 'Votre Ficher',
                'attr'=>['class' => 'form-control'],
                'required' => false,
                'mapped' => false
            ])
            ->add('Telecharger', SubmitType::class, [
                'attr'=>['class' => 'btn btn-success'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concour::class,
        ]);
    }
}
