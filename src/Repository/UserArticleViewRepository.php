<?php

// src/Repository/UserArticleViewRepository.php
namespace App\Repository;

use App\Entity\User;
use App\Entity\UserArticleView;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserArticleViewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserArticleView::class);
    }

    public function findRecentlyViewedArticles(User $user, $limit = 5)
    {
        return $this->createQueryBuilder('uav')
            ->select('uav, a')
            ->leftJoin('uav.article', 'a')
            ->where('uav.user = :user')
            ->setParameter('user', $user)
            ->orderBy('uav.viewedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    
}
