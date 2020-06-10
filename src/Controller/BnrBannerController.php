<?php

namespace App\Controller;

use App\Entity\BnrBanner;
use App\Form\BnrBanner1Type;
use App\Repository\BnrBannerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bnr/banner")
 */
class BnrBannerController extends AbstractController
{
    /**
     * @Route("/", name="bnr_banner_index", methods={"GET"})
     */
    public function index(BnrBannerRepository $bnrBannerRepository): Response
    {
        return $this->render('bnr_banner/index.html.twig', [
            'bnr_banners' => $bnrBannerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bnr_banner_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bnrBanner = new BnrBanner();
        $form = $this->createForm(BnrBanner1Type::class, $bnrBanner);
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
        $form = $this->createForm(BnrBanner1Type::class, $bnrBanner);
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
