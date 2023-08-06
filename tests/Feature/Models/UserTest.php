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

use Tests\Traits\ValidationTrait;
use CachetHQ\Cachet\Models\User;
use Tests\TestCase;

/**
 * This is the user model test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class UserTest extends TestCase
{
    use ValidationTrait;

    public function testValidation()
    {
        $this->checkRules(new User());
    }
}
