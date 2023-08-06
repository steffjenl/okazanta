<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Events\Component;

use Tests\Traits\EventTrait;
use CachetHQ\Cachet\Bus\Events\Component\ComponentEventInterface;
use Tests\TestCase as AbstractTestCase;

abstract class AbstractComponentEventTestCase extends AbstractTestCase
{
    use EventTrait;

    protected function getEventInterfaces()
    {
        return [ComponentEventInterface::class];
    }
}
