<?php

namespace App\Form;

use App\Entity\Address;
use App\Entity\Firm;
use Doctrine\DBAL\Types\DateTimeType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FirmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('siren')
            ->add('immatriculationCity')
            ->add('immatriculationDate', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class,
            ["years" =>  range(2023, 1500)])
            ->add('capital')
            ->add('legalForm')
            ->add('address', CollectionType::class ,
                ['entry_type' => AddressType::class,
                    'entry_options' => ['label' => false],
                    'allow_add' => true,
                    'allow_delete' => true,] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Firm::class,
        ]);
    }
}
