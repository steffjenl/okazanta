<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Providers;

use Illuminate\Support\ServiceProvider;
use ReflectionClass;
use Tests\ServiceProviderTestCase;

/**
 * This is the event service provider test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 * @author James Brooks <james@alt-three.com>
 * @author Stephan Eizinga <stephan@monkeysoft.nl>
 */
class EventServiceProviderTest extends ServiceProviderTestCase
{
    //use EventServiceProviderTrait;

    /**
     * @throws \ReflectionException
     */
    public function testIsAnEventServiceProvider()
    {
        $class = 'CachetHQ\\Cachet\\Providers\\EventServiceProvider';

        $reflection = new ReflectionClass($class);

        $provider = new ReflectionClass(ServiceProvider::class);

        $msg = "Expected class '$class' to be a service provider.";

        $this->assertTrue($reflection->isSubclassOf($provider), $msg);
    }
}
