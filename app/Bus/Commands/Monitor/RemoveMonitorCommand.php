<?php

namespace CachetHQ\Cachet\Bus\Commands\Monitor;

use CachetHQ\Cachet\Models\Monitor;

final class RemoveMonitorCommand
{
    /**
     * The metric to remove.
     *
     * @var \CachetHQ\Cachet\Models\Monitor
     */
    public $monitor;

    /**
     * Create a new remove monitor command instance.
     *
     * @param \CachetHQ\Cachet\Models\Metric $monitor
     *
     * @return void
     */
    public function __construct(Monitor $monitor)
    {
        $this->monitor = $monitor;
    }
}
