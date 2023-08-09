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
use CachetHQ\Cachet\Bus\Commands\Metric\RemoveMonitorCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\Metric\RemoveMonitorCommandHandler;
use CachetHQ\Cachet\Models\Metric;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the remove metric command test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class RemoveMetricCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = ['metric' => new Metric()];
        $object = new RemoveMonitorCommand($params['metric']);

        return compact('params', 'object');
    }

    protected function getHandlerClass()
    {
        return RemoveMonitorCommandHandler::class;
    }
}
