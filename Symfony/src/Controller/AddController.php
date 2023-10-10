<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Tour;
use App\Form\TourType;


class AddController extends AbstractController
{
    #[Route('/add', name: 'app_add')]
    public function index(): Response
    {
        return $this->render('add/index.html.twig', [
            'controller_name' => 'AddController',
        ]);
    }
    #[Route('/add/tour', name: 'app_add_tour')]
    public function addTour(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tour = new Tour();
        $form = $this->createForm(TourType::class, $tour);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Déterminer le moment de la journée en fonction de l'heure du rendez-vous
            $hour = (int)$tour->getAppointmentTime()->format('H');
            if ($hour < 12) {
                $tour->setTimeOfDay('morning');
            } elseif ($hour < 17) {
                $tour->setTimeOfDay('noon');
            } else {
                $tour->setTimeOfDay('evening');
            }
    
            // Sauvegarder l'entité
            $entityManager->persist($tour);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_tour', ['date' => $tour->getDate()->format('Y-m-d')]);
        }
    
        return $this->render('add/tour.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}