<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Repository\MenusRepository;
// use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MenuController extends AbstractController
{
    #[Route('/menu', name: 'app_menus')]
    public function index(): Response
    {
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }

    #[Route('/menu/{id}', name: 'app_menu')]
    public function details(MenusRepository $menusRepository, int $id): Response
    {
        $menu = $menusRepository->findOneById($id);

        if (!$menu) {
          throw $this->createNotfoundException(
            'No product found for id'.$id
          );
        }

        return $this->render('menu/details.html.twig', [
            'controller_name' => 'MenuController',
            'menu' => $menu,
        ]);
    }
}
