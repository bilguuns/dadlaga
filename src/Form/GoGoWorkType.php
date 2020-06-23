<?php

namespace App\Form;

use App\Entity\BnrBanner;
use App\Entity\BnrCompany;
use App\Entity\BnrPosition;
use App\Entity\CmsOperator;
use App\Entity\GoGoWork;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoGoWorkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company',EntityType::class,['class'=>BnrCompany::class,'choice_label'=>'name',])
            ->add('Type',EntityType::class,['class'=>\App\Entity\GoGoWorkType::class,'choice_label'=>'name',])
            ->add('name')
            ->add('start_date')
            ->add('end_date')

//            ->add('clicked_count')
            ->add('day')
            ->add('price')

            ->add('sale')
            ->add('payment')
            ->add('arrearge')
//            ->add('total')
//            ->add('comment')
//            ->add('contactName')

            ->add('noat',CheckboxType::class, ['required' => false, 'label' => 'НӨАТ', 'mapped' => false,])

            ->add('user',EntityType::class,['class'=>CmsOperator::class,'choice_label'=>'username',])

            ->add('responded_by',EntityType::class,['class'=>CmsOperator::class,'choice_label'=>'username',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GoGoWork::class,
        ]);
    }
}
