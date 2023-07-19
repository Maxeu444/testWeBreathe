<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Modules;
use App\Form\ModuleType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class HomeController extends AbstractController 
{
    #[Route('/', name: 'home.index', methods: ['GET'])]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $donnees = $entityManager->getRepository(Modules::class)->findAll();

        return $this->render('index.html.twig', [
            'donnees' => $donnees,
        ]);
    }
}