<?php

namespace App\Form;

use App\Entity\BnrCompany;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BnrCompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('username')
            ->add('pass')
            ->add('email')
            ->add('percent')
            ->add('paid')
            ->add('banner_id')
            ->add('por')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BnrCompany::class,
        ]);
    }
}
