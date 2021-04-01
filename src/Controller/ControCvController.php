<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvType;
use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Demandeur;
use App\Entity\User;
use App\Entity\Offer;

#[Route('/contro/cv')]
class ControCvController extends AbstractController
{
    #[Route('/', name: 'contro_cv_index', methods: ['GET'])]
    public function index(CvRepository $cvRepository): Response
    { 
        return $this->render('contro_cv/index.html.twig', [
            'cvs' => $cvRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'contro_cv_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cv);
            $entityManager->flush();

            return $this->redirectToRoute('contro_cv_index');
        }

        return $this->render('contro_cv/new.html.twig', [
            'cvs' => $cv,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'contro_cv_show', methods: ['GET'])]
    public function show(Cv $cv): Response
    {
        return $this->render('contro_cv/show.html.twig', [
            'cvs' => $cv,
        ]);
    }

    #[Route('/{id}/edit', name: 'contro_cv_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cv $cv): Response
    {
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contro_cv_index');
        }

        return $this->render('contro_cv/edit.html.twig', [
            'cvs' => $cv,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'contro_cv_delete', methods: ['POST'])]
    public function delete(Request $request, Cv $cv): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cv->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cv);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contro_cv_index');
    }
}
