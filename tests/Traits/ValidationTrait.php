<?php

declare(strict_types=1);

namespace Tests\Traits;

use Illuminate\Foundation\Application;

/**
 * This is the validation trait.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
trait ValidationTrait
{

    /**
     * Check the rules on the given object are valid.
     *
     * @param object $object
     *
     * @return void
     */
    protected function checkRules($object)
    {
        $this->assertTrue(property_exists($object, 'rules'));

        $this->assertIsArray($object->rules);

        foreach ($object->rules as $rule) {
            $this->checkRule($rule);
        }
    }

    /**
     * Check the given validation rule is valid.
     *
     * @param string[]|string $rule
     *
     * @return void
     */
    protected function checkRule($rule)
    {
        $this->assertTrue(is_array($rule) || is_string($rule));

        $parts = is_array($rule) ? $rule : explode('|', $rule);

        $this->assertTrue(isset($parts[0]));

        if ($this->enforceRequiredOrNullable()) {
            $this->assertTrue($parts[0] === 'required' || $parts[0] === 'nullable');
        }

        foreach ($parts as $part) {
            $this->assertIsString($part);
        }
    }

    /**
     * Should we require rules to be required or nullable?
     *
     * @return bool
     */
    protected function enforceRequiredOrNullable()
    {
        return version_compare(Application::VERSION, '5.3') === 1;
    }
}
