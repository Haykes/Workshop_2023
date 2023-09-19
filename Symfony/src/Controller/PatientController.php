<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function add(): Response
    {
        return $this->render('patient/add.html.twig', [
            'controller_name' => 'PatientController',
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
