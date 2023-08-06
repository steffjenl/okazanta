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
use CachetHQ\Cachet\Bus\Commands\User\SignupUserCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\User\SignupUserCommandHandler;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the signup user command test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class SignupUserCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = [
            'username' => 'Test',
            'password' => 'fooey',
            'email'    => 'test@example.com',
            'level'    => 1,
        ];

        $object = new SignupUserCommand(
            $params['username'],
            $params['password'],
            $params['email'],
            $params['level']
        );

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return true;
    }

    protected function getHandlerClass()
    {
        return SignupUserCommandHandler::class;
    }
}
