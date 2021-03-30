<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Tests\Cachet;

use CachetHQ\Cachet\Models\Component;
use CachetHQ\Cachet\Models\Incident;
use CachetHQ\Cachet\Models\Setting;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Notification;
use CachetHQ\Cachet\Notifications\Subscriber\VerifySubscriptionNotification;
use CachetHQ\Cachet\Notifications\Subscriber\ManageSubscriptionNotification;
use CachetHQ\Cachet\Models\Subscriber;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

/**
 * This is the smoke test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class SmokeTest extends AbstractTestCase
{
    use DatabaseMigrations;

    public function test_setup_page()
    {
        $this->get('/setup')->assertStatus(200);
    }

    public function test_status_page()
    {
        $this->configureApp();

        $this->get('/')->assertStatus(200);
    }

    public function test_single_component_page()
    {
        $this->configureApp();

        $this->get('/incidents/1')->assertStatus(200);
    }

    /**
     * Test the subscribe process works
     */
    public function test_subscribe_page()
    {
        $this->configureApp();

        Notification::fake();

        $this->get('/subscribe')->assertStatus(200);

        Notification::assertNothingSent();

        $this->post('/subscribe', ['email' => 'test@example.com'])->assertStatus(302);

        $subscriber = Subscriber::where('email', 'test@example.com')->first();

        Notification::assertSentTo(
            [$subscriber],
            VerifySubscriptionNotification::class
        );
        Notification::assertNotSentTo(
            [$subscriber],
            ManageSubscriptionNotification::class
        );

        $verify_route = URL::signedRoute(cachet_route_generator('subscribe.verify'), ['code' => $subscriber->verify_code]);

        $this->followingRedirects()->get($verify_route)->assertStatus(200);

        # Subscriber should now be verified
        $subscriber->refresh();
        $this->assertEquals(true, $subscriber->getIsVerifiedAttribute());
    }

    /**
     * Ensure existing subscriber can receive manage subscriptions email
     */
    public function test_existing_subscriber_managing_own_subscription()
    {
        $this->configureApp();

        $subscriber = factory(Subscriber::class)->create([
            'email'  => 'test@example.com',
            'verified_at' => Carbon::now(),
        ]);

        Notification::fake();

        $this->get('/subscribe')->assertStatus(200);

        Notification::assertNothingSent();

        $this->post('/subscribe', ['email' => 'test@example.com'])->assertStatus(302);

        Notification::assertNotSentTo(
            [$subscriber],
            VerifySubscriptionNotification::class
        );
        Notification::assertSentTo(
            [$subscriber],
            ManageSubscriptionNotification::class
        );
    }

    public function test_dashboard_auth_page()
    {
        $this->configureApp();

        $this->get('/auth/login')->assertStatus(200);
    }

    protected function configureApp()
    {
        factory(Setting::class)->create([
            'name'  => 'app_name',
            'value' => 'Cachet Test Suite',
        ]);

        $component = factory(Component::class)->create();

        $incident = factory(Incident::class)->create([
            'component_id' => $component->id,
        ]);
    }
}
