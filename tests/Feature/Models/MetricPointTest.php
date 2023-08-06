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
use CachetHQ\Cachet\Models\MetricPoint;
use Tests\TestCase;

/**
 * This is the metric point model test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class MetricPointTest extends TestCase
{
    use ValidationTrait;

    public function testValidation()
    {
        $this->checkRules(new MetricPoint());
    }
}
