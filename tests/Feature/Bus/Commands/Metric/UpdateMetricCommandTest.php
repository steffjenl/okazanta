<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Commands\Metric;

use Tests\Traits\CommandTrait;
use CachetHQ\Cachet\Bus\Commands\Metric\UpdateMetricCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\Metric\UpdateMetricCommandHandler;
use CachetHQ\Cachet\Models\Metric;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the update metric command test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class UpdateMetricCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = [
            'metric'        => new Metric(),
            'name'          => 'Coffee',
            'suffix'        => 'cups',
            'description'   => 'Cups of coffee consumed',
            'default_value' => 0,
            'calc_type'     => 0,
            'display_chart' => 1,
            'places'        => 0,
            'default_view'  => 0,
            'threshold'     => 0,
            'order'         => 0,
            'visible'       => 1,
        ];

        $object = new UpdateMetricCommand(
            $params['metric'],
            $params['name'],
            $params['suffix'],
            $params['description'],
            $params['default_value'],
            $params['calc_type'],
            $params['display_chart'],
            $params['places'],
            $params['default_view'],
            $params['threshold'],
            $params['order'],
            $params['visible']
        );

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return true;
    }

    protected function getHandlerClass()
    {
        return UpdateMetricCommandHandler::class;
    }
}
