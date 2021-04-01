<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Demandeur;
use App\Entity\User;
use App\Entity\Offer;

class CvController extends AbstractController
{
    #[Route('/cv', name: 'cv')]
    public function index(): Response
    {
        return $this->render('app/cv.html.twig', [
            'controller_name' => 'CvController',
        ]);
    }
} 


