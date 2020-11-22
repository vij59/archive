<?php

namespace App\Form;

use App\Entity\Snapshot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SnapshotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('siren')
            ->add('immatriculationCity')
            ->add('immatriculationDate')
            ->add('capital')
            ->add('legalForm')
            ->add('firm')
            ->add('address')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Snapshot::class,
        ]);
    }
}
