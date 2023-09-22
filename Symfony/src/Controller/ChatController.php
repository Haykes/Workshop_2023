<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Repository\MessageRepository;

class ChatController extends AbstractController
{
    #[Route('/chat', name: 'chat_list')]
    public function index(MessageRepository $messageRepository): Response
    {
        $messages = $messageRepository->findAll();
    
        return $this->render('chat/list.html.twig', ['messages' => $messages]);
    }
    
    #[Route('/chat/{id}', name: 'chat_detail')]
    public function detail(int $id, MessageRepository $messageRepository): Response
    {
        $message = $messageRepository->find($id);
        if (!$message) {
            throw $this->createNotFoundException('Message not found');
        }

        return $this->render('chat/detail.html.twig', ['message' => $message]);
    }
}
