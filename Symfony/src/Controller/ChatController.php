<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Form\MessageType;
use Symfony\Component\HttpFoundation\Request;


class ChatController extends AbstractController
{
    #[Route('/chat', name: 'app_chat')]
    public function index(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
    
        // Création d'un nouveau message
        $message = new Message();
        $message->setSender($this->getUser()); // Supposant que l'utilisateur actuel est connecté
    
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($message);
            $entityManager->flush();
    
            // Rediriger vers la même page pour éviter le rechargement du formulaire
            return $this->redirectToRoute('app_chat');
        }
    
        // Récupérer les messages pour l'affichage. Vous pouvez filtrer, paginer ou trier selon vos besoins.
        $messages = $entityManager->getRepository(Message::class)->findBy([], ['id' => 'DESC']); 
    
        return $this->render('chat/index.html.twig', [
            'form' => $form->createView(),
            'messages' => $messages,
        ]);
    }
    
}
