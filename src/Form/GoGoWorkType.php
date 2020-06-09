<?php

namespace App\Form;

use App\Entity\GoGoWork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoGoWorkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('arrearge')
            ->add('clicked_count')
            ->add('day')
            ->add('end_date')
            ->add('name')
            ->add('payment')
            ->add('price')
            ->add('sale')
            ->add('start_date')
            ->add('total')
            ->add('comment')
            ->add('contact_name')
            ->add('type')
            ->add('company')
            ->add('user')
            ->add('responded_by')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GoGoWork::class,
        ]);
    }
}
