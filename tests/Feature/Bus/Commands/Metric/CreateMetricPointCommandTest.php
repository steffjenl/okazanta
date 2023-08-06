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


use CachetHQ\Cachet\Bus\Commands\Metric\CreateMetricPointCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\Metric\CreateMetricPointCommandHandler;
use CachetHQ\Cachet\Models\Metric;
use Tests\TestCase as AbstractTestCase;
use Tests\Traits\CommandTrait;

/**
 * This is the create metric point command test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class CreateMetricPointCommandTest extends AbstractTestCase
{
    use CommandTrait;
    protected function getObjectAndParams()
    {
        $params = ['metric' => new Metric(), 'value' => 1, 'created_at' => '2020-12-30 12:00:00'];
        $object = new CreateMetricPointCommand($params['metric'], $params['value'], $params['created_at']);

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return true;
    }

    protected function getHandlerClass()
    {
        return CreateMetricPointCommandHandler::class;
    }
}
