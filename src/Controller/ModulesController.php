<?php

namespace App\Controller;

use App\Entity\Modules;
use App\Form\ModuleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ModulesController extends AbstractController
{

    /**
     * @Route("/add-module", name="add_module")
     */
    public function ajouterModule(Request $request, EntityManagerInterface $entityManager): Response
    {
        $module = new Modules();
        $form = $this->createForm(ModuleType::class, $module);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $module->setcreationDate(new \DateTime());
            $entityManager->persist($module);
            $entityManager->flush();

            return $this->redirectToRoute('home.index');
        }

        return $this->render('formModule.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
