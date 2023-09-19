<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransmissionController extends AbstractController
{
    #[Route('/transmission', name: 'app_transmission')]
    public function index(): Response
    {
        return $this->render('transmission/index.html.twig', [
            'controller_name' => 'TransmissionController',
        ]);
    }
}
