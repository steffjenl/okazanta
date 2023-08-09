<?php

namespace CachetHQ\Cachet\Bus\Commands\Monitor;

/**
 * This is the create monitor command class.
 *
 * @author Stephan Eizinga <stephan@monkeysoft.nl>
 */
final class CreateMonitorCommand
{
    /**
     * The metric name.
     *
     * @var string
     */
    public $name;

    /**
     * The metric description.
     *
     * @var string
     */
    public $description;

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'name'          => 'required|string',
        'description'   => 'nullable|string',
    ];

    /**
     * Create a new add monitor command instance.
     *
     * @param string $name
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}
