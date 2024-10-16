<?php

namespace App\Services;
use Stripe\Stripe;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Stripe\Checkout\Session;

class StripeService implements StripeServiceInterface {

  // pour récuperer id de paiment
  private const STRIPE_PAYMENT_ID = "session_stripe_payment_id";
  private const STRIPE_PAYMENT_ORDER = "session_stripe_payment_order";
  //----


  public function __construct(
    readonly private string $stripeSecret,
    readonly private UrlGeneratorInterface $urlGenerator,
    readonly private RequestStack $requestStack // récupérer tous pour valider ou non des transactions
  ){
    Stripe::setApiKey($stripeSecret);
  }

  public function Paiement($panier, $id_order): string
  {
    if (empty($panier)) {
      throw new \Exception('The cart (panier) is empty before calling Paiement.');
  }
  $stripeUrl = $this->stripeService->Paiement($panier, $id_order);

  
    $mySession = $this->requestStack->getSession();

    $session = Session::create([
      'success_url' => $this->urlGenerator->generate('app_stripe_success', ['order' => $id_order->getId()], UrlGeneratorInterface::ABSOLUTE_URL),
      'cancel_url' => $this->urlGenerator->generate('app_stripe_cancel', ['order' => $id_order->getId()], UrlGeneratorInterface::ABSOLUTE_URL),
      'payment_method_types' => ['card'],
      'line_items' => $this->getLinesItems($panier),
      'mode' => 'payment',
      ]);

      $mySession->set(self::STRIPE_PAYMENT_ID, $session->id);
      $mySession->set(self::STRIPE_PAYMENT_ORDER, $id_order->getId());

      return $session->url;
    }

  public function getSessionId(): mixed{
    return $this->requestStack->getSession()->get(self::STRIPE_PAYMENT_ID);
  }
  public function getSessionOrder(): mixed{
    return $this->requestStack->getSession()->get(self::STRIPE_PAYMENT_ORDER);
  }

  private function getLinesItems($panier): array
  {
    $products = [];

    foreach($panier as $item)
    {
      $product['price_data']['currency'] = "eur";
      $product['price_data']['product_data']['name'] = $item["product"]->getName();
      $product['price_data']['unit_amount'] = $item['product']->getPrice()*100;
      $product['quantity'] = $item['quantity'];
      $products[] = $product;
    }
    if (empty($products)) {
      throw new \Exception('No products were created for line items.');
  }

    return $products;

  }

}
