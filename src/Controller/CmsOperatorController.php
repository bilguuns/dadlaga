<?php

namespace App\Controller;

use App\Entity\CmsOperator;
use App\Form\CmsOperatorType;
use App\Repository\CmsOperatorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cms/operator")
 */
class CmsOperatorController extends AbstractController
{
    /**
     * @Route("/", name="cms_operator_index", methods={"GET"})
     */
    public function index(CmsOperatorRepository $cmsOperatorRepository): Response
    {
        return $this->render('cms_operator/index.html.twig', [
            'cms_operators' => $cmsOperatorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cms_operator_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cmsOperator = new CmsOperator();
        $form = $this->createForm(CmsOperatorType::class, $cmsOperator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cmsOperator);
            $entityManager->flush();

            return $this->redirectToRoute('cms_operator_index');
        }

        return $this->render('cms_operator/new.html.twig', [
            'cms_operator' => $cmsOperator,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cms_operator_show", methods={"GET"})
     */
    public function show(CmsOperator $cmsOperator): Response
    {
        return $this->render('cms_operator/show.html.twig', [
            'cms_operator' => $cmsOperator,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cms_operator_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CmsOperator $cmsOperator): Response
    {
        $form = $this->createForm(CmsOperatorType::class, $cmsOperator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cms_operator_index');
        }

        return $this->render('cms_operator/edit.html.twig', [
            'cms_operator' => $cmsOperator,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cms_operator_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CmsOperator $cmsOperator): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cmsOperator->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cmsOperator);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cms_operator_index');
    }
}
