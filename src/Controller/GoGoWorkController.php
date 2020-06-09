<?php

namespace App\Controller;

use App\Entity\GoGoWork;
use App\Form\GoGoWorkType;
use App\Repository\GoGoWorkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function index(GoGoWorkRepository $goGoWorkRepository): Response
    {
        return $this->render('go_go_work/index.html.twig', [
            'go_go_works' => $goGoWorkRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="go_go_work_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $goGoWork = new GoGoWork();
        $form = $this->createForm(GoGoWorkType::class, $goGoWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($goGoWork);
            $entityManager->flush();

            return $this->redirectToRoute('go_go_work_index');
        }

        return $this->render('go_go_work/new.html.twig', [
            'go_go_work' => $goGoWork,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="go_go_work_show", methods={"GET"})
     */
    public function show(GoGoWork $goGoWork): Response
    {
        return $this->render('go_go_work/show.html.twig', [
            'go_go_work' => $goGoWork,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="go_go_work_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GoGoWork $goGoWork): Response
    {
        $form = $this->createForm(GoGoWorkType::class, $goGoWork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('go_go_work_index');
        }

        return $this->render('go_go_work/edit.html.twig', [
            'go_go_work' => $goGoWork,
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
