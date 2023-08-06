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

use CachetHQ\Cachet\Bus\Events\Metric\MetricPointWasRemovedEvent;
use CachetHQ\Cachet\Models\MetricPoint;
use CachetHQ\Cachet\Models\User;

/**
 * This is the metric point was removed event test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class MetricPointWasRemovedEventTest extends AbstractMetricEventTestCase
{
    protected function objectHasHandlers()
    {
        return false;
    }

    protected function getObjectAndParams()
    {
        $params = ['user' => new User(), 'metricPoint' => new MetricPoint()];
        $object = new MetricPointWasRemovedEvent($params['user'], $params['metricPoint']);

        return compact('params', 'object');
    }
}
