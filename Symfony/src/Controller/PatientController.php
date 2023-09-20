<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Form\PatientType;
use App\Entity\Patients; 

class PatientController extends AbstractController
{
    #[Route('/patient', name: 'app_patient')]
    public function index(): Response
    {
        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
        ]);
    }

    #[Route('/patient/add', name: 'app_patient_add')]
    public function add(Request $request): Response
    {

         // Créez un objet de formulaire Symfony
         $patient = new Patients(); // Assurez-vous de créer la classe Patient ou d'adapter celle que vous utilisez

         // Créez un formulaire Symfony à partir de la classe PatientType (à créer)
         $form = $this->createForm(PatientType::class, $patient);
 
         // Gérez la soumission du formulaire
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()) {
             // Enregistrez les données en base de données
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($patient);
             $entityManager->flush();
 
             // Redirigez l'utilisateur vers une page de confirmation ou une autre page
             return $this->redirectToRoute('app_patient');
         }


        return $this->render('patient/add.html.twig', [
            'controller_name' => 'PatientController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/patient/view', name: 'app_patient_view')]
    public function view(): Response
    {
        return $this->render('patient/view.html.twig', [
            'controller_name' => 'PatientController',
        ]);
    }
}
