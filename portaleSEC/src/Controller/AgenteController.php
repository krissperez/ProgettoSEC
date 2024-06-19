<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgenteController extends AbstractController
{
    #[Route('/', name: 'app_lucky_number')]
    public function homepage() : Response
    {
        return new Response("<h1>Ciao</h1>");
    }
}