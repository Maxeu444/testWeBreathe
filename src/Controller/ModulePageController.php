<?php

namespace App\Controller;

use App\Entity\Modules;
use App\Entity\HistoriqueFonctionnement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ModulePageController extends AbstractController
{
    /**
     * @Route("/module/{id}", name="afficher_donnee")
     */
    public function afficherDonnee($id, ManagerRegistry $doctrine): Response
    {
        $ModId = $id;
        $entityManager = $doctrine->getManager();
        $info = $entityManager->getRepository(Modules::class)->find($id);
        $mesures = $entityManager->getRepository(HistoriqueFonctionnement::class)->findBy(['module' => $ModId]);

        $chartData = [];
        foreach ($mesures as $mesure) {
            $dateTime = $mesure->getDateHeure();

            $chartData[] = [
                'label' => $dateTime->format('Y-m-d H:i:s'),
                'value' => $mesure->getTauxRemplissage(),
            ];
        }

        return $this->render('historic.html.twig', [
            'info' => $info,
            'mesures' => $mesures,
            'chartData' => json_encode($chartData),
        ]);
    }
}
