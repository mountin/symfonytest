<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Controller\AdminController;
use App\Repository\BookRepository;



class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    protected function renderAdminTemplate(string $template, array $data = []): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render($template, $data);
    }
}
