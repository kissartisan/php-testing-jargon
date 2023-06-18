<?php

namespace Tests;

use App\Subscription;
use App\User;
use PHPUnit\Framework\TestCase;

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
        $gateway = new FakeGateway(); // Don't use the actual Gateway. Use a dummy/fake version.
        $subscription = new Subscription($gateway);
        $user = new User('JohnDie');

        $this->assertFalse($user->isSubscribed());

        $subscription->create($user);

        $this->assertTrue($user->isSubscribed());
    }
}