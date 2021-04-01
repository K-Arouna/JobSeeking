<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Demandeur;
use App\Entity\User;
use App\Entity\Offer;

class EntrepriseController extends AbstractController
{
    #[Route('/entreprise', name: 'entreprise')]
    public function index(): Response
    {
        return $this->render('entreprise/index.html.twig', [
            'controller_name' => 'EntrepriseController',
        ]);
    }

    #[Route('/entreprise', name: 'list')]
    public function list(): Response
    {
        return $this->render('entreprise/list.html.twig', [
            'controller_name' => 'EntrepriseController',
        ]);
    }

    #[Route('/entreprise', name: 'appOffre')]
    public function appOffre(): Response
    {
        return $this->render('entreprise/appOffre.html.twig', [
            'controller_name' => 'EntrepriseController',
        ]);
    }
}
