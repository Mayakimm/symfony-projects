<?php

namespace App\Services;

interface StripeServiceInterface
{
    // Define the methods you expect the Stripe service to have.
    public function Payment($panier, $id_order): string;

    public function getSessionId(): mixed;

    public function getSessionOrder(): mixed;
}
