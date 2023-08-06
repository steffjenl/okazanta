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
use CachetHQ\Cachet\Models\IncidentUpdate;
use Tests\TestCase;

/**
 * This is the incident model test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class IncidentUpdateTest extends TestCase
{
    use ValidationTrait;

    public function testValidation()
    {
        $this->checkRules(new IncidentUpdate());
    }
}
