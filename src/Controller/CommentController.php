<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends AbstractController
{
    #[Route('ajax/comments', name: 'comment_add')]
    public function add(Request $request): Response
    {

        $commentData = $request->request->all('comment');

        return $this->render('comment/index', [
            'controller_name' => 'CommentController',
        ]);
    }
}
