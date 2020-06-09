<?php

namespace App\Controller;

use App\Entity\GoGoWorkType;
use App\Form\GoGoWorkTypeType;
use App\Repository\GoGoWorkTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/go/go/work/type")
 */
class GoGoWorkTypeController extends AbstractController
{
    /**
     * @Route("/", name="go_go_work_type_index", methods={"GET"})
     */
    public function index(GoGoWorkTypeRepository $goGoWorkTypeRepository): Response
    {
        return $this->render('go_go_work_type/index.html.twig', [
            'go_go_work_types' => $goGoWorkTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="go_go_work_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $goGoWorkType = new GoGoWorkType();
        $form = $this->createForm(GoGoWorkTypeType::class, $goGoWorkType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($goGoWorkType);
            $entityManager->flush();

            return $this->redirectToRoute('go_go_work_type_index');
        }

        return $this->render('go_go_work_type/new.html.twig', [
            'go_go_work_type' => $goGoWorkType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="go_go_work_type_show", methods={"GET"})
     */
    public function show(GoGoWorkType $goGoWorkType): Response
    {
        return $this->render('go_go_work_type/show.html.twig', [
            'go_go_work_type' => $goGoWorkType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="go_go_work_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GoGoWorkType $goGoWorkType): Response
    {
        $form = $this->createForm(GoGoWorkTypeType::class, $goGoWorkType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('go_go_work_type_index');
        }

        return $this->render('go_go_work_type/edit.html.twig', [
            'go_go_work_type' => $goGoWorkType,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="go_go_work_type_delete", methods={"DELETE"})
     */
    public function delete(Request $request, GoGoWorkType $goGoWorkType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$goGoWorkType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($goGoWorkType);
            $entityManager->flush();
        }

        return $this->redirectToRoute('go_go_work_type_index');
    }
}
