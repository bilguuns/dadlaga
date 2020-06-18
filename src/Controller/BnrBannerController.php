<?php

namespace App\Controller;

use App\Entity\BnrBanner;
use App\Form\BnrBannerType;
use App\Repository\BnrBannerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
//        $form = $this->createForm(BannerSearchType::class);
//
//
//        $searchValue = '';
//        if ($form->isSubmitted() && $form->isValid()) {
//            $searchValue = $request->get('name');
////            return $this->render('bnr_banner/index.html.twig', [
////                'form' => $form->createView(),
////                'bnr_banners' => $bnrBannerRepository->findAll(),
////                'searchValue' => $searchValue,
////            ]);
//        }

        return $this->render('bnr_banner/index.html.twig', [
//            'form' => $form->createView(),
            'bnr_banners' => $bnrBannerRepository->findAll()
        ]);
    }
    public function search()
    {
        $form=$this->createFormBuilder(null)
            ->add('name', TextType::class)
            ->add('search',SubmitType::class,[
                'attr'=>[
                    'class'=>'btn btn-primary'
                ]
            ])
            ->getForm();
        return $this->render('bnr_banner/index.html.twig',[
            'form'=>$form->createView()
            ]);
    }

    /**
     * @Route("/new", name="bnr_banner_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bnrBanner = new BnrBanner();
        $form = $this->createForm(BnrBannerType::class, $bnrBanner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bnrBanner);
            $entityManager->flush();

            return $this->redirectToRoute('bnr_banner_index');
        }

        return $this->render('bnr_banner/new.html.twig', [
            'bnr_banner' => $bnrBanner,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bnr_banner_show", methods={"GET"})
     */
    public function show(BnrBanner $bnrBanner): Response
    {
        return $this->render('bnr_banner/show.html.twig', [
            'bnr_banner' => $bnrBanner,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bnr_banner_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BnrBanner $bnrBanner): Response
    {
        $form = $this->createForm(BnrBannerType::class, $bnrBanner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bnr_banner_index');
        }

        return $this->render('bnr_banner/edit.html.twig', [
            'bnr_banner' => $bnrBanner,
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
