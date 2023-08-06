<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Api;

use CachetHQ\Cachet\Models\User;
use Tests\TestCase as AbstractTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

/**
 * This is the abstract api test case class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 * @author James Brooks <james@alt-three.com>
 */
abstract class AbstractApiTestCase extends AbstractTestCase
{
    use DatabaseMigrations;

    /**
     * Become a user.
     *
     * @return $this
     */
    protected function beUser()
    {
        $this->user = factory(User::class)->create([
            'username' => 'cachet-test',
        ]);

        $this->be($this->user);

        return $this;
    }
}
