<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends AbstractController
{
    #[Route('ajax/comments', name: 'comment_add')]
    public function add(Request $request, ArticleRepository $articleRepo,CommentRepository $commentRepo, EntityManagerInterface $em, UserRepository $userRepo): Response
    {

        $commentData = $request->request->all('comment');


        if(!$this->isCsrfTokenValid('comment-add', $commentData['_token'])){
            return $this->json([
                'code' => 'INVALID_CSRF_TOKEN'
            ], Response::HTTP_BAD_REQUEST);
        }

$article = $articleRepo->findOneBy(['id' => $commentData['article']]);

if(!$article){
    return $this->json([
        'code' => 'ARTICLE_NOT_FOUND'
    ], Response::HTTP_BAD_REQUEST);
}

$comment = new Comment($article);
$comment->setContent(json_encode($commentData['content']));
dump($commentData['content']);
$user = $userRepo->findOneBy(['id' => 2]);
dump($user);

$comment->setCreatedAt(new \DateTime());

$em->persist($comment);
$em->flush();

$html = $this->renderView('comment/index.html.twig',[
    'comment' => $comment
]);

return $this->json([
    'code' => 'COMMENT_ADDED_SUCCESSFULY',
    'message' => $html,
    'numberOfComments' => $commentRepo->count(['article' => $article])
]);
    }
 
}
