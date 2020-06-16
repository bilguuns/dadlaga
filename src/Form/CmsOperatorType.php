<?php

namespace App\Form;

use App\Entity\CmsOperator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CmsOperatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('password')
            ->add('permission', ChoiceType::class, [
                'choices' => [
                    'Admin' => 'Admin',
                    'User' => 'User',
                ],
            ])
            ->add('username')
            ->add('last_logged')
            ->add('phonenumber')
            ->add('firstname')
            ->add('editor')
            ->add('real_ip')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CmsOperator::class,
        ]);
    }
}
