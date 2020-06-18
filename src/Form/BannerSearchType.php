<?php

namespace App\Form;

use App\Entity\BnrCompany;
use App\Entity\BnrPosition;
use App\Entity\CmsOperator;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class BannerSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => false,
                'label' => 'Баннерийн нэр',
            ])
//            ->add('position', TextType::class, ['required' => false, 'label' => 'Үсрэх хаяг',])
//            ->add('company',DateTimeType::class, ['required' => true, 'date_label' => 'Эхлэх огноо',])
        ;
    }
}
