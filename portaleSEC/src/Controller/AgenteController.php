<?php

namespace App\Controller;

use App\Entity\Agents;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgenteController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    #[Route('/', name: 'home')]
    public function homepage() : Response
    {
        $cap = $this->em->getRepository(Users::class)->findAll();

        return $this->json($cap);
    }
}