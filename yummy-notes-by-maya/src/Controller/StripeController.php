<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\MenusRepository;
use App\Services\StripeServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\OrderRepository;

class StripeController extends AbstractController
{
  public function __construct(
    private readonly StripeServiceInterface $stripeServiceInterface,
    private readonly EntityManagerInterface $entityManagerInterface,
    private readonly MenusRepository $menusRepository,
    private readonly OrderRepository $orderRepository,
  )
  {

  }

  #[Route('/stripe/success/{order}', name: 'app_stripe_success')]
    public function success($order, Session $session)
    {
      $panier = $session->get('panier', []);
      $order = $this->orderRepository->find($order);
      $order->setPaid(1);
      $this->entityManagerInterface->flush();

      $session->remove('panier');
      return $this->render('stripe/index.html.twig', [

    ]);
    }

    #[Route('/stripe/cancel/{order}', name: 'app_stripe_cancel')]
    public function cancel($order, SessionInterface $session)
    {
      $order = $this->orderRepository->find($order);
      $this->entityManagerInterface->remove($order);
      $this->entityManagerInterface->flush();

      return $this->redirectToRoute('app_panier');
    }

  #[Route('/stripe', name: 'app_stripe')]
    public function index(Session $session): Response
    {
      $panier = $session->get('panier', []);
      $data = [];
      $total = 0;

      $order = new Order();
      $this->entityManagerInterface->persist($order);

      foreach($panier as $key => $quantity) {
        $menu = $this->menusRepository->find($key);

        $data[] = [
          "menu" => $menu,
          "quantity" => $quantity
        ];
        $total += $menu->getPrice() * $quantity;
      }

      $order->setAmountTotal($total);
      $order->setPaid(false);
      $order->setPaymentId(1);

      if($this->getUser()){
        $order->setUser($this->getUser());
      }

      $this->entityManagerInterface->flush();
      $url = $this->stripeServiceInterface->Payment($data, $order);

        return $this->redirect($url, Response::HTTP_SEE_OTHER);
    }
}
