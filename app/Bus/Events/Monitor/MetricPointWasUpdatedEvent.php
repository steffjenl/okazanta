<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Events\Monitor;

use CachetHQ\Cachet\Bus\Events\ActionInterface;
use CachetHQ\Cachet\Models\MetricPoint;
use CachetHQ\Cachet\Models\User;

final class MetricPointWasUpdatedEvent implements ActionInterface, MetricEventInterface
{
    /**
     * The user who updated the metric point.
     *
     * @var \CachetHQ\Cachet\Models\User
     */
    public $user;

    /**
     * The metric point that was updated.
     *
     * @var \CachetHQ\Cachet\Models\MetricPoint
     */
    public $metricPoint;

    /**
     * Create a new metric point was updated event instance.
     *
     * @param \CachetHQ\Cachet\Models\User        $user
     * @param \CachetHQ\Cachet\Models\MetricPoint $metricPoint
     *
     * @return void
     */
    public function __construct(User $user, MetricPoint $metricPoint)
    {
        $this->user = $user;
        $this->metricPoint = $metricPoint;
    }

    /**
     * Get the event description.
     *
     * @return string
     */
    public function __toString()
    {
        return 'Metric Point was updated.';
    }

    /**
     * Get the event action.
     *
     * @return array
     */
    public function getAction()
    {
        return [
            'user'        => $this->user,
            'description' => (string) $this,
        ];
    }
}
