<?php

namespace App\Entity;

use App\Repository\UserArticleViewRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserArticleViewRepository::class)]
class UserArticleView
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'userArticleViews')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'userArticleViews')]
    private ?Article $article = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private $viewedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): static
    {
        $this->article = $article;

        return $this;
    }

 public function getViewedAt(): ?\DateTimeInterface
    {
        return $this->viewedAt;
    }

    public function setViewedAt(\DateTimeInterface $viewedAt): self
    {
        $this->viewedAt = $viewedAt;

        return $this;
    }
}
