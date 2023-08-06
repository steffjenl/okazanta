<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Events\Metric;

use CachetHQ\Cachet\Bus\Events\Metric\MetricWasRemovedEvent;
use CachetHQ\Cachet\Models\Metric;
use CachetHQ\Cachet\Models\User;

class MetricWasRemovedEventTest extends AbstractMetricEventTestCase
{
    protected function objectHasHandlers()
    {
        return false;
    }

    protected function getObjectAndParams()
    {
        $params = ['user' => new User(), 'metric' => new Metric()];
        $object = new MetricWasRemovedEvent($params['user'], $params['metric']);

        return compact('params', 'object');
    }
}
