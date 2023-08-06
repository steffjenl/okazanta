<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Api;

use CachetHQ\Cachet\Bus\Events\Subscriber\SubscriberHasSubscribedEvent;
use CachetHQ\Cachet\Models\Component;
use CachetHQ\Cachet\Models\Subscriber;
use CachetHQ\Cachet\Models\Subscription;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Event;

/**
 * This is the subscriber test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class SubscriberTest extends AbstractApiTestCase
{
    public function test_can_get_all_subscribers()
    {
        $this->beUser();

        $subscriber = factory(Subscriber::class)->create();

        $response = $this->json('GET', '/api/v1/subscribers');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json');
    }

    public function test_cannot_get_subscribers_without_authorization()
    {
        $response = $this->json('GET', '/api/v1/subscribers');

        $response->assertStatus(401);
        $response->assertHeader('Content-Type', 'application/json');
    }

    public function test_can_create_subscriber()
    {
        // get default event dispatcher
        $initialEvent = Event::getFacadeRoot();

        $this->beUser();

        Notification::fake();
        Event::fake();

        // set event dispatcher to old one, don't use the fake one
        Subscriber::setEventDispatcher($initialEvent);

        $response = $this->json('POST', '/api/v1/subscribers', [
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertJsonFragment(['email' => 'test@example.com']);

        Event::assertDispatched(SubscriberHasSubscribedEvent::class);
    }

    public function test_can_create_subscriber_automatically_verified()
    {
        // get default event dispatcher
        $initialEvent = Event::getFacadeRoot();

        $this->beUser();

        Notification::fake();
        Event::fake();

        // set event dispatcher to old one, don't use the fake one
        Subscriber::setEventDispatcher($initialEvent);

        $response = $this->json('POST', '/api/v1/subscribers', [
            'email'  => 'test@example.com',
            'verify' => true,
        ]);

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertJsonFragment(['email' => 'test@example.com']);

        Event::assertDispatched(SubscriberHasSubscribedEvent::class);
    }

    public function test_can_create_subscriber_with_subscription()
    {
        $this->beUser();

        factory(Component::class, 3)->create();

        $response = $this->json('POST', '/api/v1/subscribers', [
            'email'      => 'test@example.com',
            'verify'     => true,
            'components' => [
                1,
                3,
            ],
        ]);

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/json');
        $response->assertJsonFragment(['email' => 'test@example.com']);

        $data = $response->decodeResponseJson();
        $this->assertCount(2, $data['data']['subscriptions']);
        $this->assertEquals(1, $data['data']['subscriptions'][0]['component_id']);
        $this->assertEquals(3, $data['data']['subscriptions'][1]['component_id']);
    }

    public function test_can_delete_subscriber()
    {
        $this->beUser();

        $subscriber = factory(Subscriber::class)->create();
        $response = $this->json('DELETE', "/api/v1/subscribers/{$subscriber->id}");

        $response->assertStatus(204);
    }

    public function test_can_delete_subscription()
    {
        $this->beUser();

        $subscription = factory(Subscription::class)->create();

        $response = $this->json('DELETE', "/api/v1/subscriptions/{$subscription->id}");

        $response->assertStatus(204);
    }
}
