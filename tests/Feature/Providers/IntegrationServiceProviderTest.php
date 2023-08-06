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

use CachetHQ\Cachet\Integrations\Contracts\Beacon;
use CachetHQ\Cachet\Integrations\Contracts\Credits;
use CachetHQ\Cachet\Integrations\Contracts\Feed;
use CachetHQ\Cachet\Integrations\Contracts\Releases;
use CachetHQ\Cachet\Integrations\Contracts\System;
use Tests\ServiceProviderTestCase;
/**
 * This is the integration service provider test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class IntegrationServiceProviderTest extends ServiceProviderTestCase
{

    public function testBeaconIsInjectable()
    {
        $this->assertIsInjectable(Beacon::class);
    }

    public function testCreditsIsInjectable()
    {
        $this->assertIsInjectable(Credits::class);
    }

    public function testFeedIsInjectable()
    {
        $this->assertIsInjectable(Feed::class);
    }

    public function testSystemIsInjectable()
    {
        $this->assertIsInjectable(System::class);
    }

    public function testReleasesIsInjectable()
    {
        $this->assertIsInjectable(Releases::class);
    }
}
