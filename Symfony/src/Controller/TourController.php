<?php

namespace App\Controller;

use App\Repository\TourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\TourType;

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
    #[Route('/tour/edit/{id}', name: 'app_edit_tour')]
    public function editTour(int $id, Request $request, TourRepository $tourRepository, EntityManagerInterface $entityManager): Response
    {
        $tour = $tourRepository->find($id);
    
        if (!$tour) {
            throw $this->createNotFoundException('Tour not found.');
        }
    
        $form = $this->createForm(TourType::class, $tour);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Pas besoin de persister ($entityManager->persist($tour);) car l'entité est déjà gérée par Doctrine
            $entityManager->flush();
    
            return $this->redirectToRoute('app_tour', ['date' => $tour->getDate()->format('Y-m-d')]);
        }
    
        return $this->render('tour/edit.html.twig', [
            'form' => $form->createView(),
            'tour' => $tour
        ]);
    }    


}
