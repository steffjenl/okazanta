<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Events\System;

use CachetHQ\Cachet\Bus\Events\System\SystemWasUpdatedEvent;

/**
 * This is the system was updated event test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class SystemWasUpdatedEventTest extends AbstractSystemEventTestCase
{
    protected function objectHasHandlers()
    {
        return false;
    }

    protected function getObjectAndParams()
    {
        $params = [];
        $object = new SystemWasUpdatedEvent();

        return compact('params', 'object');
    }
}
