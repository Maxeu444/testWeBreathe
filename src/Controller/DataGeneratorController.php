<?php

namespace App\Controller;

use App\Entity\HistoriqueFonctionnement;
use App\Entity\Modules;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class DataGeneratorController extends AbstractController
{
    #[Route("/module/{moduleId}/{fillRate}", name: "generate_data", methods: ["POST"])]
    public function generateData(Request $request, $moduleId, $fillRate,  EntityManagerInterface $entityManager ): JsonResponse
    {
        // Trouve le module associé à l'ID
        $module = $entityManager->getRepository(Modules::class)->find($moduleId);

        if (!$module) {
            return new JsonResponse(['status' => 'error', 'message' => 'Module non trouvé.']);
        }

        // Crée un nouvel enregistrement dans l'historique du fonctionnement avec les données générées
        $historique = new HistoriqueFonctionnement();
        $historique->setModule($module);
        $historique->setTauxRemplissage($fillRate);
        $historique->setEtat('Fonctionnel');  // Ou tu peux définir l'état en fonction de certaines conditions si nécessaire
// Instanciation d'un nouvel objet DateTime pour la date et l'heure actuelles
$dateHeure = new \DateTime();

// Affecter la date et l'heure actuelles à la propriété $dateHeure de votre entité
$historique->setDateHeure($dateHeure);

        // Enregistre l'historique dans la base de données
        $entityManager->persist($historique);
        $entityManager->flush();

        // Réponse JSON indiquant que les données ont été enregistrées (facultatif)
        return new JsonResponse(['status' => 'success', 'message' => 'Données enregistrées avec succès.']);
    }
}