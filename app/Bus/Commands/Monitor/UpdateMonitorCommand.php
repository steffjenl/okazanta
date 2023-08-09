<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Commands\Monitor;

use CachetHQ\Cachet\Models\Monitor;

final class UpdateMonitorCommand
{
    /**
     * The monitor.
     *
     * @var \CachetHQ\Cachet\Models\Monitor
     */
    public $monitor;

    /**
     * The metric name.
     *
     * @var string
     */
    public $name;

    /**
     * The metric suffix.
     *
     * @var string
     */
    public $suffix;

    /**
     * The metric description.
     *
     * @var string
     */
    public $description;

    /**
     * The metric default value.
     *
     * @var float
     */
    public $default_value;

    /**
     * The metric calculation type.
     *
     * @var int
     */
    public $calc_type;

    /**
     * The metric display chart.
     *
     * @var int
     */
    public $display_chart;

    /**
     * The metric decimal places.
     *
     * @var int
     */
    public $places;

    /**
     * The view to show the metric points in.
     *
     * @var int
     */
    public $default_view;

    /**
     * The threshold to buffer the metric points in.
     *
     * @var int
     */
    public $threshold;

    /**
     * The order of which to place the metric in.
     *
     * @var int|null
     */
    public $order;

    /**
     * The visibility of the metric.
     *
     * @var int
     */
    public $visible;

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'name'          => 'nullable|string',
    ];

    /**
     * Create a new update metric command instance.
     *
     * @param \CachetHQ\Cachet\Models\Monitor $monitor
     * @param string                         $name
     *
     * @return void
     */
    public function __construct(Monitor $monitor, $name)
    {
        $this->monitor = $monitor;
        $this->name = $name;
    }
}
