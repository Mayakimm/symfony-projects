<?php

namespace App\Services;

use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class StripeService implements StripeServiceInterface {

  // pour recuperer l'id de paiment il faut ces deux variables
  private const STRIPE_PAYMENT_ID = "session_stripe_payment_id";
  private const STRIPE_PAYMENT_ORDER = "session_stripe_payment_order";

  public function __construct(
    // on recupere $stripeSecret de parameters dans service.yaml dans config
    readonly private string $stripeSecret,
    // pour creer la page de paiment; et redigirer en cas de succès ou d'échec
    readonly private UrlGeneratorInterface $urlGenerator, // 유알엘 생성하는 거
    readonly private RequestStack $requestStack, // 모든 정보 전달해서 거래 승인거절 할 수 있게 하는 거
  )
  {
    Stripe::SetApiKey($stripeSecret);
  }

  public function Payment($panier, $id_order): string
  {
    $mySession = $this->requestStack->getSession();
    // pour générer le formulaire de paiement Stripe via la session

    $session = Session::create([
      'success_url'=>$this->urlGenerator->generate('app_stripe_success',['order' => $id_order->getId()], UrlGeneratorInterface::ABSOLUTE_URL),
      'cancel_url'=>$this->urlGenerator->generate('app_stripe_cancel',['order' => $id_order->getId()], UrlGeneratorInterface::ABSOLUTE_URL),
      'payment_method_types' =>['card'],
      'line_items' => $this->getLinesItems($panier),
      'mode'=> 'payment',
    ]);

    $mySession->set(self::STRIPE_PAYMENT_ID, $session->id);
    $mySession->set(self::STRIPE_PAYMENT_ORDER, $id_order->getId());

    return $session->url;
  }

  public function getSessionId(): mixed
  {
    return $this->requestStack->getSession()->get(self::STRIPE_PAYMENT_ID);
  }

  public function getSessionOrder(): mixed
  {
    return $this->requestStack->getSession()->get(self::STRIPE_PAYMENT_ORDER);
  }

  private function getLinesItems($panier): array
  {
    $menus = [];

    foreach($panier as $item)
    {
      $product = [
      'price_data' => [
            'currency' => 'eur',
            'product_data' => [
                'name' => $item["menu"]->getName(),
            ],
            'unit_amount' => $item['menu']->getPrice() * 100, // Convert to cents
        ],
        'quantity' => $item['quantity'],
      ];

      $menus[] = $product;
    }

      return $menus;
    }
  }
