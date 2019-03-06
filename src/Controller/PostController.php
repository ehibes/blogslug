<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index(PostRepository $repository)
    {
    	$posts = $repository->findAll();
        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/post/{id}", name="post_show")
     */
    public function show($id, PostRepository $repository)
    {
        return $this->render('post/show.html.twig', [
            'post' => $repository->find($id),
        ]);
    }

    /**
     * @Route("/postslug/{slug}", name="post_show_slug")
     */
    public function showSlug($slug, PostRepository $repository)
    {
        return $this->render('post/show.html.twig', [
            'post' => $repository->findOneBySlug($slug),
        ]);
    }

}
