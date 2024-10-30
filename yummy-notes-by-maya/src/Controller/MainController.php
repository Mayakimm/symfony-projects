<?php

namespace App\Controller;


use App\Entity\Menus;
use App\Entity\Categories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function home(EntityManagerInterface $entity): Response
    {
      $menus = $entity->getRepository(Menus::class)->findAll();
      $categories = $entity->getRepository(Categories::class)->findAll();
      // $topMenu :
        return $this->render('main/index.html.twig', [
            'menus' => $menus,
            'categories' => $categories,
        ]);
    }

    #[Route('/main', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
