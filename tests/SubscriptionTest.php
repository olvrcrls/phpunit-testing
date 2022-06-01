<?php
namespace Tests;

use App\Gateway;
use App\Subscription;
use App\User;
use PHPUnit\Framework\TestCase;

class SubscriptionTest extends TestCase
{
    /** @test */
    function it_creates_a_stripe_subscription()
    {
        $this->markTestSkipped();
    }

    /** @test */
    function creating_a_subscription_marks_the_user_as_subscribed()
    {
        // $gateway = new FakeGateway(); // don't use the actual Gateway. Use dummy/fake version.
        // $gateway = $this->createMock(Gateway::class);

        // $subscription = new Subscription($gateway);
        $subscription = new Subscription($this->createMock(Gateway::class));
        $user = new User("John Doe");
        $this->assertFalse($user->isSubscribed());
        $subscription->create($user);
        $this->assertTrue($user->isSubscribed());
    }
}