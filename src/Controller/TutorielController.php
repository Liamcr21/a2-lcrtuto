<?php

namespace App\Controller;
use App\Repository\CategoryRepository;
use App\Repository\ArticleRepository; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TutorielController extends AbstractController
{
    #[Route('/tutoriel', name: 'app_tutoriel')]
    public function index(ArticleRepository $articleRepo, CategoryRepository $categoryRepo): Response
    {
        return $this->render('tutoriel/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $articleRepo->findAll(),
            'categories' => $categoryRepo->findAll()
        ]);
    }
}
