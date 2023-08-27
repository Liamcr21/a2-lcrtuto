<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QsjController extends AbstractController
{
    #[Route('/qsj', name: 'app_qsj')]
    public function index(): Response
    {
        return $this->render('qsj/index.html.twig', [
            'controller_name' => 'QsjController',
        ]);
    }
}
