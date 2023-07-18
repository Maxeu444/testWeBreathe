<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
        /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        // Mettez ici la logique pour générer le contenu de la page d'accueil
        // Par exemple, pour renvoyer une simple réponse HTML :
        return new Response('<html><body>Bienvenue sur la page d\'accueil !</body></html>');
    }
}