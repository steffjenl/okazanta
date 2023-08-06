<?php

namespace Tests\Feature\Models;

use Tests\Traits\ValidationTrait;
use CachetHQ\Cachet\Models\Component;
use Tests\TestCase;

/**
 * This is the component model test class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class ComponentTest extends TestCase
{
    use ValidationTrait;

    public function testValidation()
    {
        $this->checkRules(new Component());
    }
}
