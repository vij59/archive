<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Firm;
use App\Form\FirmType;
use App\Repository\FirmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/firm")
 */
class FirmController extends AbstractController
{
    /**
     * @Route("/", name="firm_index", methods={"GET"})
     */
    public function index(FirmRepository $firmRepository): Response
    {
        return $this->render('firm/index.html.twig', [
            'firms' => $firmRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="firm_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $firm = new Firm();
        $addN= new Address();

        $firm->addAddress($addN);

        $form = $this->createForm(FirmType::class, $firm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($firm);
            $entityManager->flush();

            return $this->redirectToRoute('firm_index');
        }

        return $this->render('firm/new.html.twig', [
            'firm' => $firm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="firm_show", methods={"GET"})
     */
    public function show(Firm $firm): Response
    {
        return $this->render('firm/show.html.twig', [
            'firm' => $firm,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="firm_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Firm $firm): Response
    {
        $form = $this->createForm(FirmType::class, $firm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('firm_index');
        }

        return $this->render('firm/edit.html.twig', [
            'firm' => $firm,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="firm_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Firm $firm): Response
    {
        if ($this->isCsrfTokenValid('delete'.$firm->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($firm);
            $entityManager->flush();
        }

        return $this->redirectToRoute('firm_index');
    }
}
