<?php

namespace App\Controller;

use App\Repository\TourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TourController extends AbstractController
{
    #[Route('/tour/{date?}', name: 'app_tour')]
    public function index(?string $date, TourRepository $tourRepository): Response
    {
        $currentDate = $date ? new \DateTime($date) : new \DateTime();
        
        $tours = $tourRepository->findByDate($currentDate);
        return $this->render('tour/index.html.twig', [
            'controller_name' => 'TourController',
            'tours' => $tours,
            'currentDate' => $currentDate
        ]);
    }

}
