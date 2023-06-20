<?php

namespace Tests;

use App\Gateway;
use App\Subscription;
use App\User;
use PHPUnit\Framework\TestCase;
use Tests\DummyGateway;

class SubscriptionTest extends TestCase
{
    /** @test */
    public function it_creates_a_stripe_subscription()
    {
        $this->markTestSkipped();
    }

    /** @test */
    public function creating_a_subscription_marks_the_user_as_subscribed()
    {
        // $gateway = new DummyGateway();
        $subscription = new Subscription($this->createMock(Gateway::class));
        $user = new User('JohnDoe');

        $this->assertFalse($user->isSubscribed());

        $subscription->create($user);

        $this->assertTrue($user->isSubscribed());
    }
}