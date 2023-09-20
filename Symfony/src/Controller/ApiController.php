<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/manifest.json", name="api_manifest")
     */
    public function manifest(): JsonResponse
    {
        $manifest = [
            "name" => "Idelly",
            "short_name" => "Idelly",
            "description" => "Une description de mon app",
            "start_url" => "/",
            "display" => "standalone",
            "background_color" => "#ffffff",
            "theme_color" => "#000000",
            "icons" => [
                [
                    "src" => "/img/logo_1.PNG",
                    "sizes" => "284x281",
                    "type" => "image/png"
                ]
            ]
        ];

        return new JsonResponse($manifest);
    }
}
