<?php

namespace App\Controller;

use App\Entity\Snapshot;
use App\Form\SnapshotType;
use App\Repository\SnapshotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/snapshot")
 */
class SnapshotController extends AbstractController
{
    /**
     * @Route("/", name="snapshot_index", methods={"GET"})
     */
    public function index(SnapshotRepository $snapshotRepository): Response
    {
        return $this->render('snapshot/index.html.twig', [
            'snapshots' => $snapshotRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="snapshot_show", methods={"GET"})
     */
    public function show(Snapshot $snapshot): Response
    {
        return $this->render('snapshot/show.html.twig', [
            'snapshot' => $snapshot,
        ]);
    }

    /**
     * @Route("/{id}", name="snapshot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Snapshot $snapshot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$snapshot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($snapshot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('snapshot_index');
    }
}
