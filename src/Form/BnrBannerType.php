<?php

namespace App\Form;

use App\Entity\BnrBanner;
use App\Entity\BnrCompany;
use App\Entity\BnrPosition;
use App\Entity\CmsOperator;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class BnrBannerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['required' => false, 'label' => 'Баннерийн нэр',])
            ->add('url', TextType::class, ['required' => false, 'label' => 'Үсрэх хаяг',])
            ->add('start_date',DateTimeType::class, ['required' => true,'date_label' => 'Эхлэх огноо',])
            ->add('end_date',DateTimeType::class, ['required' => true,'date_label' => 'Дуусах огноо',])
            ->add('inserted_date')
            ->add('clicked_count')
            ->add('order_num')
            ->add('hrefUrl')
            ->add('playtime')
            ->add('status')
            ->add('approved_at')
            ->add('show_mode')
            ->add('arrearage',MoneyType::class, [
                'currency' => 'MNT'
            ])
            ->add('comment')
            ->add('condition0')
            ->add('contact_email')
            ->add('contact_name')
            ->add('contact_phone')
            ->add('paid',MoneyType::class, [
                'currency' => 'MNT'
            ])
            ->add('pay_mode')
            ->add('sale',MoneyType::class, [
                'currency' => 'MNT'
            ])
            ->add('price',MoneyType::class, [
                'currency' => 'MNT'
            ])
            ->add('day')
            ->add('payment',MoneyType::class, [
                'currency' => 'MNT'
            ])
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
            ->add('noat',CheckboxType::class, ['required' => false, 'label' => 'НӨАТ', 'mapped' => false])
            ->add('position',EntityType::class,['class'=>BnrPosition::class,'choice_label'=>'name',])
            ->add('inserted_by',EntityType::class,['class'=>CmsOperator::class,'choice_label'=>'username',])
            ->add('approved_by',EntityType::class,['class'=>CmsOperator::class,'choice_label'=>'username',])
            ->add('responded_by',EntityType::class,['class'=>CmsOperator::class,'choice_label'=>'username',])
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
