<?php

namespace App\Controller;


use App\Entity\Menus;
use App\Entity\Order;
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

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('main/about.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(EntityManagerInterface $entityManager): Response
    {
      $user = $this->getUser(); // Retrieves the current logged-in user
      // Fetch orders made by the current user
      $orders = $entityManager->getRepository(Order::class)->findBy(['user' => $user]);
  
      return $this->render('main/profile.html.twig', [
          'controller_name' => 'MainController',
          'first_name' => $user->getFirstName(),
          'last_name' => $user->getLastName(),
          'pseudo' => $user->getPseudo(),
          'orders' => $orders, // Pass the orders to the template
      ]);
    }

}
