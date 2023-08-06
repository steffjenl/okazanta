<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Commands\ComponentGroup;

use Tests\Traits\CommandTrait;
use CachetHQ\Cachet\Bus\Commands\ComponentGroup\RemoveComponentGroupCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\ComponentGroup\RemoveComponentGroupCommandHandler;
use CachetHQ\Cachet\Models\ComponentGroup;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the remove component group command test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class RemoveComponentGroupCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = ['group' => new ComponentGroup()];
        $object = new RemoveComponentGroupCommand($params['group']);

        return compact('params', 'object');
    }

    protected function getHandlerClass()
    {
        return RemoveComponentGroupCommandHandler::class;
    }
}
