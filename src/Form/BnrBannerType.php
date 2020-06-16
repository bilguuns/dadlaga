<?php

namespace App\Form;

use App\Entity\BnrBanner;
use App\Entity\BnrCompany;
use App\Entity\BnrPosition;
use App\Entity\CmsOperator;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BnrBannerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('url')
            ->add('start_date')
            ->add('end_date')
            ->add('inserted_date')
            ->add('clicked_count')
            ->add('order_num')
            ->add('hrefUrl')
            ->add('playtime')
            ->add('status')
            ->add('approved_at')
            ->add('show_mode')
            ->add('arrearage')
            ->add('comment')
            ->add('condition0')
            ->add('contact_email')
            ->add('contact_name')
            ->add('contact_phone')
            ->add('paid')
            ->add('pay_mode')
            ->add('sale')
            ->add('price')
            ->add('day')
            ->add('payment')
            ->add('dialog')
            ->add('DlgWidth')
            ->add('DlgHeight')
            ->add('canvasUrl')
            ->add('is_new')
            ->add('video_url')
            ->add('defaultImg')
            ->add('displayTime')
            ->add('swiffyBody')
            ->add('selfTab')
//            ->add('position',EntityType::class,['class'=>BnrPosition::class,'choice_label'=>'name',])
//            ->add('inserted_by',EntityType::class,['class'=>CmsOperator::class,'choice_label'=>'username',])
//            ->add('approved_by',EntityType::class,['class'=>CmsOperator::class,'choice_label'=>'username',])
//            ->add('responded_by',EntityType::class,['class'=>CmsOperator::class,'choice_label'=>'username',])
            ->add('company',EntityType::class,['class'=>BnrCompany::class,'choice_label'=>'name',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BnrBanner::class,
        ]);
    }
}
