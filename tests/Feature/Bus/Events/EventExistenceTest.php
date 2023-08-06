<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Events;

use Tests\Traits\ExistenceTrait;
use PHPUnit\Framework\TestCase;

/**
 * This is the event existence test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class EventExistenceTest extends TestCase
{
    use ExistenceTrait;

    protected static function getSourcePath()
    {
        return realpath(__DIR__.'/../../../../app/Bus/Events');
    }
}
