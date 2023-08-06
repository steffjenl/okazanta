<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Commands\Component;

use Tests\Traits\CommandTrait;
use CachetHQ\Cachet\Bus\Commands\Component\RemoveComponentCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\Component\RemoveComponentCommandHandler;
use CachetHQ\Cachet\Models\Component;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the remove component command test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class RemoveComponentCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = ['component' => new Component()];
        $object = new RemoveComponentCommand($params['component']);

        return compact('params', 'object');
    }

    protected function getHandlerClass()
    {
        return RemoveComponentCommandHandler::class;
    }
}
