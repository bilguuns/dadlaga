<?php

namespace App\Form;

use App\Entity\BnrPosition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BnrPositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('width')
            ->add('height')
            ->add('picture')
            ->add('htmlID')
            ->add('defaultBanner')
            ->add('service_id')
            ->add('price',MoneyType::class, [
                'currency' => 'MNT'
            ])
            ->add('title')
            ->add('ctitle')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BnrPosition::class,
        ]);
    }
}
