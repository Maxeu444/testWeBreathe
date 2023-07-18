<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry; // N'oubliez pas d'importer ManagerRegistry
use App\Entity\Modules;
use App\Form\ModuleType;

class ModulesController extends AbstractController
{
    /**
     * @Route("/modules", name="modules")
     */
    public function afficherDonnees(ManagerRegistry $doctrine): Response // Injection de ManagerRegistry
    {
        $entityManager = $doctrine->getManager();
        $donnees = $entityManager->getRepository(Modules::class)->findAll();

        return $this->render('modules.html.twig', [
            'donnees' => $donnees,
        ]);
    }

     /**
     * @Route("/add-module", name="add_module")
     */
    public function ajouterModule(Request $request, ManagerRegistry $doctrine): Response
    {
        $module = new Modules();

        $form = $this->createForm(ModuleType::class, $module);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($module);
            $entityManager->flush();

            return $this->redirectToRoute('modules'); // Rediriger vers la page affichant les modules après l'ajout
        }

        return $this->render('formModule.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}