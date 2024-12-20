<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        PostRepository $postRepository
    ): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('index.html.twig', [
            'posts' => $posts
        ]);
    }
}
