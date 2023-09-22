<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Repository\MessageRepository;

class ChatController extends AbstractController
{
    #[Route('/chat', name: 'app_chat')]
    public function index(): Response
    {
        return $this->render('chat/list.html.twig', [
            'controller_name' => 'ChatController',
        ]);
    }

    #[Route('/chat/ok', name: 'app_detail')]
    public function details(): Response
    {
        return $this->render('chat/detail.html.twig', [
            'controller_name' => 'ChatController',
        ]);
    }
}
