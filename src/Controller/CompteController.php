<?php

namespace App\Controller;

use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Demandeur;
use App\Entity\User;
use App\Entity\Offer;

class CompteController extends AbstractController
{
    #[Route('/compte', name: 'compte')]
    public function index(CvRepository $cvRepository): Response
    {
        $cv = $cvRepository->findAll();
        return $this->render('compte/index.html.twig', [
            'controller_name' => 'CompteController',
        ]);
    }
}
