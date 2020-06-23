<?php

namespace App\Controller;

use App\Entity\BnrPosition;
use App\Form\BnrPositionType;
use App\Repository\BnrPositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bnr/position")
 */
class BnrPositionController extends AbstractController
{
    /**
     * @Route("/", name="bnr_position_index", methods={"GET"})
     */
    public function index(BnrPositionRepository $bnrPositionRepository): Response
    {
        return $this->render('bnr_position/index.html.twig', [
            'bnr_positions' => $bnrPositionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bnr_position_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bnrPosition = new BnrPosition();
        $form = $this->createForm(BnrPositionType::class, $bnrPosition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bnrPosition);
            $entityManager->flush();

            return $this->redirectToRoute('bnr_position_index');
        }

        return $this->render('bnr_position/new.html.twig', [
            'bnr_position' => $bnrPosition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bnr_position_show", methods={"GET"})
     */
    public function show(BnrPosition $bnrPosition): Response
    {
        return $this->render('bnr_position/show.html.twig', [
            'bnr_position' => $bnrPosition,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bnr_position_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BnrPosition $bnrPosition): Response
    {
        $form = $this->createForm(BnrPositionType::class, $bnrPosition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bnr_position_index');
        }

        return $this->render('bnr_position/edit.html.twig', [
            'bnr_position' => $bnrPosition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bnr_position_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BnrPosition $bnrPosition): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bnrPosition->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bnrPosition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bnr_position_index');
    }
}
