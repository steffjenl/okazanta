<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Models;

use CachetHQ\Cachet\Models\Setting;
use Tests\TestCase;

/**
 * This is the setting model test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class SettingTest extends TestCase
{
    public function testValidation()
    {
        $this->assertObjectNotHasProperty('rules', new Setting());
    }
}
