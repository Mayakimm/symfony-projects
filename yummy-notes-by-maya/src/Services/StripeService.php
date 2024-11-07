<?php

namespace App\Services;

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
    
  }
}
