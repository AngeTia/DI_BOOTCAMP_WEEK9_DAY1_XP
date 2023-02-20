<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    #[Route('/conference', name: 'app_conference')]
    public function index(): Response
    {
        $teste = $this->hello();
        return $this->render('conference/index.html.twig', [
            'controller_name' => 'ConferenceController',
            'hello' => $teste,
        ]);
    }

    public function hello()
    {
        return 'Hello World';
    }
}
