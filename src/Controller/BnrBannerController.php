<?php

namespace App\Controller;

use App\Entity\BnrBanner;
use App\Form\BnrBannerType;
use App\Repository\BnrBannerRepository;
use App\Repository\GoGoWorkRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bnr/banner")
 */
class BnrBannerController extends AbstractController
{
    /**
     * @Route("/", name="bnr_banner_index", methods={"GET", "POST"})
     */
    public function index(BnrBannerRepository $bnrBannerRepository, Request $request): Response
    {
        return $this->render('bnr_banner/index.html.twig', [
            'bnr_banners' => $bnrBannerRepository->findAll()
        ]);
    }
    /**
     * @Route("/search")
     */

    public function searchBar(BnrBannerRepository $bnrBannerRepository, GoGoWorkRepository $goGoWorkRepository,Request $request)
    {
//        $id = $request->get('v');

        $form=$this->createFormBuilder()
            ->add('name', EntityType::class,['required' => false, 'class'=>BnrBanner::class,'choice_label'=>'name',])
            ->add('position', TextType::class,['required' => false,])
            ->add('company', TextType::class,['required' => false, ])
            ->add('startdate', DateTimeType::class,['required' => false,])
            ->add('enddate', DateTimeType::class,['required' => false, ])
            ->add('search',SubmitType::class,[
                'attr'=>[
                    'class'=>'btn btn-primary'

                ]
            ])
            ->getForm();

        return $this->render('searchBar.html.twig',[
            'form'=>$form->createView(),
            'bnr_banners' => $bnrBannerRepository->findAll(),
            'go_go_works' => $goGoWorkRepository->findAll(),
        ]);

    }

    /**
     * @Route("/new", name="bnr_banner_new", methods={"GET","POST"})
     */
    public function new(Request $request,BnrBannerRepository $bnrBannerRepository): Response
    {
        $bnrBanner = new BnrBanner();
        $form = $this->createForm(BnrBannerType::class, $bnrBanner);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $formData = $form->getData();
//            $startday=$formData->getStartDate();
//            $endday=$formData->getEndDate();
//            $days=$endday-$startday;
            $days = $formData->getDay();

            $sale = $formData->getSale();
            $Arrearage=$formData->getArrearage();
            $price=$formData->getPosition()->getPrice();

            if (true === $form['noat']->getData()) {

                if($price!=0)
                {
                    $payment =($price*((100-$sale)/100))*$days;
                    $Arrearage=$payment+($payment/10);


                }
                else
                {
                    $payment = ($days * $price);
                    $Arrearage=$payment+($payment/10);
                }
                $noat=$Arrearage;


            }
            else
            {
                $payment =($price*((100-$sale)/100))*$days;
                $Arrearage=$payment;
                $noat=0;
            }


            $bnrBanner->setPrice($price);
            $bnrBanner->setDay($days);
            $bnrBanner->setArrearage($Arrearage);
            $bnrBanner->setNOAT($noat);

            $bnrBanner->setPayment($payment);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bnrBanner);
            $entityManager->flush();

            return $this->redirectToRoute('bnr_banner_index');
        }

        return $this->render('bnr_banner/new.html.twig', [
            'form' => $form->createView(),
            'bnr_banners' => $bnrBannerRepository->findAll()
        ]);
    }

    /**
     * @Route("/{id}", name="bnr_banner_show", methods={"GET"})
     */
    public function show(BnrBanner $bnrBanner, Request $request, BnrBannerRepository $bnrBannerRepository): Response
    {
        $form = $this->createForm(BnrBannerType::class, $bnrBanner);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $formData = $form->getData();
            $days = $formData->getDay();
            $sale = $formData->getSale();
            $Arrearage=$formData->getArrearage();
            $price=$formData->getPosition()->getPrice();

            if (true === $form['noat']->getData()) {

                if($price!=0)
                {
                    $payment =($price*((100-$sale)/100))*$days;
                    $Arrearage=$payment+($payment/10);


                }
                else
                {
                    $payment = ($days * $price);
                    $Arrearage=$payment+($payment/10);
                }
                $noat=$Arrearage;


            }
            else
            {
                $payment =($price*((100-$sale)/100))*$days;
                $Arrearage=$payment;
                $noat=0;
            }


            $bnrBanner->setPrice($price);
            $bnrBanner->setArrearage($Arrearage);
            $bnrBanner->setNOAT($noat);

            $bnrBanner->setPayment($payment);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bnrBanner);
            $entityManager->flush();

            return $this->redirectToRoute('bnr_banner_index');
        }

        return $this->render('bnr_banner/show.html.twig', [
            'bnr_banner'=>$bnrBanner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bnr_banner_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BnrBanner $bnrBanner,BnrBannerRepository $bnrBannerRepository): Response
    {
        $form = $this->createForm(BnrBannerType::class, $bnrBanner);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $formData = $form->getData();
//            $startday=$formData->getStartDate();
//            $endday=$formData->getEndDate();
//            $days=$endday-$startday;
            $days = $formData->getDay();

            $sale = $formData->getSale();
            $Arrearage=$formData->getArrearage();
            $price=$formData->getPosition()->getPrice();

            if (true === $form['noat']->getData()) {

                if($price!=0)
                {
                    $payment =($price*((100-$sale)/100))*$days;
                    $Arrearage=$payment+($payment/10);


                }
                else
                {
                    $payment = ($days * $price);
                    $Arrearage=$payment+($payment/10);
                }
                $noat=$Arrearage;


            }
            else
            {
                $payment =($price*((100-$sale)/100))*$days;
                $Arrearage=$payment;
                $noat=0;
            }


            $bnrBanner->setPrice($price);
            $bnrBanner->setArrearage($Arrearage);
            $bnrBanner->setNOAT($noat);
            $bnrBanner->setDay($days);

            $bnrBanner->setPayment($payment);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bnrBanner);
            $entityManager->flush();

            return $this->redirectToRoute('bnr_banner_index');
        }

        return $this->render('bnr_banner/edit.html.twig', [
            'bnr_banner'=>$bnrBanner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bnr_banner_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BnrBanner $bnrBanner): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bnrBanner->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bnrBanner);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bnr_banner_index');
    }
}
