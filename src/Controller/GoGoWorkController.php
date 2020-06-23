<?php

namespace App\Controller;

use App\Entity\GoGoWork;
use App\Form\GoGoWorkType;
use App\Repository\GoGoWorkRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/go/go/work")
 */
class GoGoWorkController extends AbstractController
{
    /**
     * @Route("/", name="go_go_work_index", methods={"GET"})
     */
    public function index(GoGoWorkRepository $goGoWorkRepository,Request $request): Response
    {


        $work= new GoGoWork();
        $form = $this->createForm(GoGoWorkType::class, $work);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $formData = $form->getData();
            $days = $formData->getDay();
            $sale = $formData->getSale();
            $Arrearge=$formData->getArrearge();
            $price=$formData->getType()->getPrice();

            if (true === $form['noat']->getData()) {

                if($price!=0)
                {
                    $payment =($price*((100-$sale)/100))*$days;
                    $Arrearge=$payment+($payment/10);


                }
                else
                {
                    $payment = ($days * $price);
                    $Arrearge=$payment+($payment/10);
                }
                $noat=$Arrearge;


            }
            else
            {
                $payment =($price*((100-$sale)/100))*$days;
                $Arrearge=$payment;
                $noat=0;
            }


            $work->setPrice($price);
            $work->setArrearge($Arrearge);
            $work->setNOAT($noat);

            $work->setPayment($payment);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($work);
            $entityManager->flush();

            return $this->redirectToRoute('bnr_banner_index');
        }

        return $this->render('go_go_work/index.html.twig', [
            'form' => $form->createView(),
            'go_go_works' => $goGoWorkRepository->findAll(),
        ]);

    }

//    public function searchBar(GoGoWorkRepository $goGoWorkRepository, Request $request)
//    {
////        $id = $request->get('v');
//
//        $form=$this->createFormBuilder()
////            ->add('name', EntityType::class,['required' => false, 'class'=>GoGoWork::class,'choice_label'=>'name',])
////            ->add('position', TextType::class,['required' => false,])
////            ->add('company', TextType::class,['required' => false, ])
////            ->add('startdate', DateTimeType::class,['required' => false,])
////            ->add('enddate', DateTimeType::class,['required' => false, ])
////            ->add('search',SubmitType::class,[
////                'attr'=>[
////                    'class'=>'btn btn-primary'
////
////                ]
////            ])
//            ->getForm();
//
//        return $this->render('searchBar.html.twig',[
//            'form'=>$form->createView(),
//            'go_go_works' => $goGoWorkRepository->findAll(),
//        ]);
//
//    }






    /**
     * @Route("/new", name="go_go_work_new", methods={"GET","POST"})
     */
    public function new(Request $request,GoGoWorkRepository $goGoWorkRepository): Response
    {
        $work = new GoGoWork();
        $form = $this->createForm(GoGoWorkType::class, $work);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $formData = $form->getData();
            $days = $formData->getDay();
            $sale = $formData->getSale();
            $Arrearge = $formData->getArrearge();
            $price = $formData->getType()->getPrice();

            if (true === $form['noat']->getData()) {

                if ($price != 0) {
                    $payment = ($price * ((100 - $sale) / 100)) * $days;
                    $Arrearge = $payment + ($payment / 10);


                } else {
                    $payment = ($days * $price);
                    $Arrearge = $payment + ($payment / 10);
                }
                $noat = $Arrearge;


            } else {
                $payment = ($price * ((100 - $sale) / 100)) * $days;
                $Arrearge = $payment;
                $noat = 0;
            }


            $work->setPrice($price);
            $work->setArrearge($Arrearge);
            $work->setNOAT($noat);

            $work->setPayment($payment);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($work);
            $entityManager->flush();

            return $this->redirectToRoute('go_go_work_index');
        }

        return $this->render('go_go_work/new.html.twig', [
            'form' => $form->createView(),
            'go_go_works' => $goGoWorkRepository->findAll(),
        ]);
    }
    /**
     * @Route("/{id}", name="go_go_work_show", methods={"GET"})
     */
    public function show(GoGoWork $work,Request $request,GoGoWorkRepository $goGoWorkRepository): Response
    {
        $form = $this->createForm(GoGoWorkType::class, $work);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $formData = $form->getData();
            $days = $formData->getDay();
            $sale = $formData->getSale();
            $Arrearge=$formData->getArrearge();
            $price=$formData->getType()->getPrice();

            if (true === $form['noat']->getData()) {

                if($price!=0)
                {
                    $payment =($price*((100-$sale)/100))*$days;
                    $Arrearge=$payment+($payment/10);


                }
                else
                {
                    $payment = ($days * $price);
                    $Arrearge=$payment+($payment/10);
                }
                $noat=$Arrearge;


            }
            else
            {
                $payment =($price*((100-$sale)/100))*$days;
                $Arrearge=$payment;
                $noat=0;
            }


            $work->setPrice($price);
            $work->setArrearge($Arrearge);
            $work->setNOAT($noat);

            $work->setPayment($payment);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($work);
            $entityManager->flush();

            return $this->redirectToRoute('go_go_work_index');
        }

        return $this->render('go_go_work/show.html.twig', [
            'go_go_work'=>$work,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="go_go_work_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GoGoWork $work,GoGoWorkRepository $goGoWorkRepository): Response
    {
        $form = $this->createForm(GoGoWorkType::class, $work);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $formData = $form->getData();
            $days = $formData->getDay();
            $sale = $formData->getSale();
            $Arrearge=$formData->getArrearge();
            $price=$formData->getType()->getPrice();

            if (true === $form['noat']->getData()) {

                if($price!=0)
                {
                    $payment =($price*((100-$sale)/100))*$days;
                    $Arrearge=$payment+($payment/10);


                }
                else
                {
                    $payment = ($days * $price);
                    $Arrearge=$payment+($payment/10);
                }
                $noat=$Arrearge;


            }
            else
            {
                $payment =($price*((100-$sale)/100))*$days;
                $Arrearge=$payment;
                $noat=0;
            }


            $work->setPrice($price);
            $work->setArrearge($Arrearge);
            $work->setNOAT($noat);

            $work->setPayment($payment);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($work);
            $entityManager->flush();

            return $this->redirectToRoute('go_go_work_index');
        }

        return $this->render('go_go_work/edit.html.twig', [
            'go_go_work'=>$work,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="go_go_work_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GoGoWork $goGoWork): Response
    {
        if ($this->isCsrfTokenValid('delete'.$goGoWork->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($goGoWork);
            $entityManager->flush();
        }

        return $this->redirectToRoute('go_go_work_index');
    }
}
