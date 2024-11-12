<?php

namespace App\Controller;

use App\Services\StripeServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Attribute\Route;

class StripeController extends AbstractController
{
  public function __construct(
    private readonly StripeServiceInterface $stripeServiceInterface,
    private readonly EntityManagerInterface $entityManagerInterface,
    private readonly MenusRepository $menusRepository,
  )
  {

  }

  #[Route('/stripe', name: 'app_stripe')]
    public function index(Session $session): Response
    {
      $panier = $session->get("Panier", []);
      $data = [];
      $total = 0;

      $order = new Order();
      $this->entityManagerInterface->persist($order);

      foreach($panier as $key => $quantity) {
        $menu = $this->menusRepository->find($key);

        $data[] = [
          "menu" => $menu,
          "quantity" => quantity
        ];
        $total += $menu->getPrice() * $quantity;
      }

      $order->setAmountTotal($total);
      $order->setPaid(false);
      $order->setPaymentId($this->stripeServiceInterface->getSessionId());

      if($this->getUser()){
        $order->setUser($this->getUser());
      }

      $this->entityManagerInterface->flush();
      $url = $this->stripeServiceInterface->Payment($data, $order);

        return $this->redirect($url, Response::HTTP_SEE_OTHER);
    }
}
