<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Demandeur;
use App\Entity\User;
use App\Entity\Offer; 

 
      
class DemandeurController extends AbstractController
{
    #[Route('/demandeur', name: 'demandeur')]
    public function index(): Response
    {
        return $this->render('demandeur/index.html.twig', [
            'controller_name' => 'DemandeurController',
        ]);
    }

    #[Route('/demandeur/inscription', name: 'inscription')]
    public function inscription(): Response
    {
        return $this->render('demandeur/inscription.html.twig', [
            'controller_name' => 'DemandeurController',
        ]);
    }
}
