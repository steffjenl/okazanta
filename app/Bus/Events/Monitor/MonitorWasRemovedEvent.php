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
use CachetHQ\Cachet\Models\Monitor;
use CachetHQ\Cachet\Models\User;

final class MonitorWasRemovedEvent implements ActionInterface, MonitorEventInterface
{
    /**
     * The user who removed the metric.
     *
     * @var \CachetHQ\Cachet\Models\User
     */
    public $user;

    /**
     * The monitor that was removed.
     *
     * @var \CachetHQ\Cachet\Models\Monitor
     */
    public $monitor;

    /**
     * Create a new metric was removed event instance.
     *
     * @param \CachetHQ\Cachet\Models\User   $user
     * @param \CachetHQ\Cachet\Models\Monitor $monitor
     *
     * @return void
     */
    public function __construct(User $user, Monitor $monitor)
    {
        $this->user = $user;
        $this->monitor = $monitor;
    }

    /**
     * Get the event description.
     *
     * @return string
     */
    public function __toString()
    {
        return 'Monitor was removed.';
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
