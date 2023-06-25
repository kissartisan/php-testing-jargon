<?php

namespace Tests;

class GatewayStub implements \App\Gateway
{
    public function create()
    {
        // Create the subscription through Stripe
        return 'receipt-stub';
    }
}