<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Events\ComponentGroup;

use Tests\Traits\EventTrait;
use CachetHQ\Cachet\Bus\Events\ComponentGroup\ComponentGroupEventInterface;
use Tests\TestCase as AbstractTestCase;

abstract class AbstractComponentGroupEventTestCase extends AbstractTestCase
{
    use EventTrait;

    protected function getEventInterfaces()
    {
        return [ComponentGroupEventInterface::class];
    }
}
