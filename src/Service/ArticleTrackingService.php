<?php


namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\UserArticleView;

class ArticleTrackingService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function trackArticleView(User $user, Article $article)
    {
        $userArticleView = new UserArticleView();
        $userArticleView->setUser($user);
        $userArticleView->setArticle($article);
        $userArticleView->setViewedAt(new \DateTime());

        $this->entityManager->persist($userArticleView);
        $this->entityManager->flush();
    }
    
}



?>