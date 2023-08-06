<?php

namespace Tests;

use CachetHQ\Cachet\Models\Subscriber;
use CachetHQ\Cachet\Models\User;
use CachetHQ\Cachet\Settings\Cache;
use CachetHQ\Cachet\Settings\Repository;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

/**
 * This is the abstract test case class.
 *
 */
abstract class AbstractTestCase extends TestCase
{
    use CreatesApplication;

    /**
     * Test actor.
     *
     * @var \CachetHQ\Cachet\Models\User
     */
    protected $user;

    /**
     * Sign in an user if it's the case.
     *
     * @param \CachetHQ\Cachet\Models\User|null $user
     *
     * @return AbstractTestCase
     */
    protected function signIn(User $user = null)
    {
        $this->user = $user ?: $this->createUser();

        $this->be($this->user);

        return $this;
    }

    /**
     * Create and return a new user.
     *
     * @param array $properties
     *
     * @return \CachetHQ\Cachet\Models\User
     */
    protected function createUser($properties = [])
    {
        return factory(User::class)->create($properties);
    }

    /**
     * Set up the needed configuration to be able to run the tests.
     *
     * @return AbstractTestCase
     */
    protected function setupConfig()
    {
        $env = $this->app->environment();
        $repo = $this->app->make(Repository::class);
        $cache = $this->app->make(Cache::class);
        $loaded = $cache->load($env);

        if ($loaded === false) {
            $loaded = $repo->all();
            $cache->store($env, $loaded);
        }

        $settings = array_merge($this->app->config->get('setting'), $loaded);

        $this->app->config->set('setting', $settings);

        //
        Bus::fake();
        Event::fake();
        Notification::fake();
        Mail::fake();

        $this->resetEvents();

        return $this;
    }

    private function resetEvents()
    {
        // Define the models that have event listeners.
        $models = array('Subscriber','Tag');

        // Reset their event listeners.
        foreach ($models as $model) {

            // Flush any existing listeners.
            call_user_func(array($model, 'flushEventListeners'));

            // Reregister them.
            call_user_func(array($model, 'boot'));
        }
    }
}
