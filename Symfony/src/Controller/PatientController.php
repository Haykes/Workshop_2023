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
        $patients = $this->getDoctrine()->getRepository(Patients::class)->findAll();

        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patients' => $patients,
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

    #[Route('/patient/view/{id}', name: 'app_patient_view')]
    public function view(int $id): Response
    {
        $patient = $this->getDoctrine()->getRepository(Patients::class)->find($id);

        if (!$patient) {
            throw $this->createNotFoundException('Patient non trouvé');
        }

        return $this->render('patient/view.html.twig', [
            'controller_name' => 'PatientController',
            'patient' => $patient,
        ]);
    }


    #[Route('/patient/edit/{id}', name: 'app_patient_edit')]
    public function edit(int $id, Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $patient = $entityManager->getRepository(Patients::class)->find($id);

        if (!$patient) {
            throw $this->createNotFoundException('Patient introuvable');
        }

        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Le patient a été modifié avec succès.');

            return $this->redirectToRoute('app_patient');
        }

        return $this->render('patient/edit.html.twig', [
            'form' => $form->createView(),
            'patient' => $patient,
        ]);
    }

    #[Route('/patient/delete/{id}', name: 'app_patient_delete')]
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $patient = $entityManager->getRepository(Patients::class)->find($id);

        if (!$patient) {
            throw $this->createNotFoundException('Patient introuvable');
        }

        $entityManager->remove($patient);
        $entityManager->flush();

        $this->addFlash('success', 'Le patient a été supprimé avec succès.');

        return $this->redirectToRoute('app_patient');
    }

}
