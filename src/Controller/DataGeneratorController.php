<?php

namespace App\Controller;

use App\Entity\Modules;
use App\Entity\HistoriqueFonctionnement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DataGeneratorController extends AbstractController
{
    #[Route("/module/{moduleId}/{fillRate}", name: "generate_data", methods: ["POST"])]
    public function generateData(Request $request, $moduleId, $fillRate,  EntityManagerInterface $entityManager, SessionInterface $session): JsonResponse
    {
        $module = $entityManager->getRepository(Modules::class)->find($moduleId);

        if (!$module) {
            return new JsonResponse(['status' => 'error', 'message' => 'Module non trouvé.']);
        }

        $historique = new HistoriqueFonctionnement();
        $historique->setModule($module);

        if (rand(1, 100) <= 30) {
            $historique->setEtat('Panne');
            $session->set('displayModal', true);
        } else {
            $historique->setEtat('Fonctionnel');
            $historique->setTauxRemplissage($fillRate);
            $session->set('displayModal', false);
        }

        $dateHeure = new \DateTime();
        $historique->setDateHeure($dateHeure);

        $entityManager->persist($historique);
        $entityManager->flush();


    }
}
