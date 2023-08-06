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

use Tests\Traits\EventTrait;
use CachetHQ\Cachet\Bus\Events\User\UserEventInterface;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the abstract user event test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
abstract class AbstractUserEventTestCase extends AbstractTestCase
{
    use EventTrait;

    protected function getEventInterfaces()
    {
        return [UserEventInterface::class];
    }
}
