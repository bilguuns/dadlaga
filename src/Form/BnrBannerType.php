<?php

namespace App\Form;

use App\Entity\BnrBanner;
use Symfony\Component\Form\AbstractType;
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
            ->add('position')
            ->add('inserted_by')
            ->add('approved_by')
            ->add('responded_by')
            ->add('company')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BnrBanner::class,
        ]);
    }
}
