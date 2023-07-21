<?php

namespace App\Controller;

use App\Entity\Modules;
use App\Entity\HistoriqueFonctionnement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;


class ModulePageController extends AbstractController
{
    /**
     * @Route("/module/{id}", name="afficher_donnee")
     */
    public function afficherDonnee($id,ChartBuilderInterface $chartBuilder, ManagerRegistry $doctrine):Response
    {

        $ModId = $id;
        $entityManager = $doctrine->getManager();
        $info = $entityManager->getRepository(Modules::class)->find($id);
        $mesures = $entityManager->getRepository(HistoriqueFonctionnement::class)->findBy(['module' => $ModId]);
        $chart = $this->generateChart($chartBuilder);

        // Passer les données à la vue "historic.twig.html"
        return $this->render('historic.html.twig', [
            'info' => $info,
            'mesures' => $mesures,
            'chart' => $chart,
        ]);
    }

    /**
     * Méthode pour générer le graphique
     */
    private function generateChart(ChartBuilderInterface $chartBuilder): Chart
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);

        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ]);

        return $chart;
    }
}

  











// // src/Controller/MeasurementController.php

// namespace App\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;

// class MeasurementController extends AbstractController
// {
//     /**
//      * @Route("/api/measurement", name="api_measurement", methods={"POST"})
//      */
//     public function saveMeasurement(Request $request): Response
//     {
//         // Récupère les données de mesure envoyées depuis le client
//         $measurementData = json_decode($request->getContent(), true);

//         // Enregistre les données dans la base de données
//         // Assure-toi d'avoir configuré Doctrine correctement pour utiliser l'EntityManager

//         // Exemple :
//         // $measurement = new Measurement();
//         // $measurement->setData($measurementData);
//         // $entityManager = $this->getDoctrine()->getManager();
//         // $entityManager->persist($measurement);
//         // $entityManager->flush();

//         return new Response('Measurement saved successfully', Response::HTTP_OK);
//     }
// }
