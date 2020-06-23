<?php

namespace App\Controller;

use App\Entity\BnrCompany;
use App\Form\BnrCompanyType;
use App\Repository\BnrCompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bnr/company")
 */
class BnrCompanyController extends AbstractController
{
    /**
     * @Route("/", name="bnr_company_index", methods={"GET"})
     */
    public function index(BnrCompanyRepository $bnrCompanyRepository): Response
    {
        return $this->render('bnr_company/index.html.twig', [
            'bnr_companies' => $bnrCompanyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bnr_company_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {

        $bnrCompany = new BnrCompany();
        $form = $this->createForm(BnrCompanyType::class, $bnrCompany);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bnrCompany);
            $entityManager->flush();

            return $this->redirectToRoute('bnr_company_index');
        }

        return $this->render('bnr_company/new.html.twig', [
            'bnr_company' => $bnrCompany,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bnr_company_show", methods={"GET"})
     */
    public function show(BnrCompany $bnrCompany): Response
    {
        return $this->render('bnr_company/show.html.twig', [
            'bnr_company' => $bnrCompany,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bnr_company_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BnrCompany $bnrCompany): Response
    {
        $form = $this->createForm(BnrCompanyType::class, $bnrCompany);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bnr_company_index');
        }

        return $this->render('bnr_company/edit.html.twig', [
            'bnr_company' => $bnrCompany,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bnr_company_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BnrCompany $bnrCompany): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bnrCompany->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bnrCompany);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bnr_company_index');
    }
}
