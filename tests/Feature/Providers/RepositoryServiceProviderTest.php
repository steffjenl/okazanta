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

use CachetHQ\Cachet\Repositories\Metric\MetricRepository;
use GrahamCampbell\TestBenchCore\LaravelTrait;
use Tests\ServiceProviderTestCase;

/**
 * This is the repository service provider test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class RepositoryServiceProviderTest extends ServiceProviderTestCase
{
    use LaravelTrait;

    public function testMetricRepositoryIsInjectable()
    {
        $this->assertIsInjectable(MetricRepository::class);
    }
}
