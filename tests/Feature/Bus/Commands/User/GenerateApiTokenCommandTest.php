<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Commands\User;

use Tests\Traits\CommandTrait;
use CachetHQ\Cachet\Bus\Commands\User\GenerateApiTokenCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\User\GenerateApiTokenCommandHandler;
use CachetHQ\Cachet\Models\User;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the generate api token command test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class GenerateApiTokenCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = ['user' => new User()];
        $object = new GenerateApiTokenCommand($params['user']);

        return compact('params', 'object');
    }

    protected function getHandlerClass()
    {
        return GenerateApiTokenCommandHandler::class;
    }
}
