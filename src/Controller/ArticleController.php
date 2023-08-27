<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use App\Service\ArticleTrackingService;

class ArticleController extends AbstractController
{
    #[Route('/article/{slug}', name: 'article_show')]
    public function show(?Article $article, Request $request, ArticleTrackingService $trackingService): Response
    {
        if (!$article) {
            return $this->redirectToRoute('app_home');
        }

        if ($this->getUser()) {
            $trackingService->trackArticleView($this->getUser(), $article);
        }

        return $this->renderForm('article/show.html.twig', [
            'article' => $article,
        ]);
    }

}
