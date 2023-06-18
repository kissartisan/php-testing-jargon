<?php

namespace App;

class StripeGateway implements Gateway
{
    public function create()
    {
        // Performs the Stripe HTTP request
        var_dump('Slow HTTP request in progress.');
    }
}