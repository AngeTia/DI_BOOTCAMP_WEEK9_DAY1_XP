<?php

namespace App\Controller;

use App\Service\GreetingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GreetingController extends AbstractController
{
    /**
     * @Route("/{name}", name="greeting")
     */
    public function index(GreetingService $greetingService, $name): Response
    {
        $greeting = $greetingService->getGreeting($name);

        return $this->render('greeting/index.html.twig', [
            'greeting' => $greeting,
        ]);
    }
}
