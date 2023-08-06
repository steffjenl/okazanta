<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Events\User;

use CachetHQ\Cachet\Bus\Events\User\UserWasCreatedEvent;
use CachetHQ\Cachet\Models\User;

/**
 * This is the user was created event test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 * @author James Brooks <james@alt-three.com>
 */
class UserWasCreatedEventTest extends AbstractUserEventTestCase
{
    protected function objectHasHandlers()
    {
        return false;
    }

    protected function getObjectAndParams()
    {
        $params = ['user' => new User()];
        $object = new UserWasCreatedEvent($params['user']);

        return compact('params', 'object');
    }
}
