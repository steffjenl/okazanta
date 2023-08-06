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
use CachetHQ\Cachet\Bus\Commands\Component\CreateComponentCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\Component\CreateComponentCommandHandler;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the create component command test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class CreateComponentCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = [
            'name'        => 'Test',
            'description' => 'Foo',
            'status'      => 1,
            'link'        => 'https://cachethq.io',
            'order'       => 0,
            'group_id'    => 0,
            'enabled'     => true,
            'meta'        => null,
            'tags'        => 'Foo, Bar',
        ];
        $object = new CreateComponentCommand(
            $params['name'],
            $params['description'],
            $params['status'],
            $params['link'],
            $params['order'],
            $params['group_id'],
            $params['enabled'],
            $params['meta'],
            $params['tags']
        );

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return true;
    }

    protected function getHandlerClass()
    {
        return CreateComponentCommandHandler::class;
    }
}
