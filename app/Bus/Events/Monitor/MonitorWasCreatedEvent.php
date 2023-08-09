<?php

namespace CachetHQ\Cachet\Bus\Events\Monitor;

use CachetHQ\Cachet\Bus\Events\ActionInterface;
use CachetHQ\Cachet\Models\Monitor;
use CachetHQ\Cachet\Models\User;

/**
 * This is the metric was created event class.
 *
 * @author James Brooks <james@alt-three.com>
 */
final class MonitorWasCreatedEvent implements ActionInterface, MonitorEventInterface
{
    /**
     * The user who added the metric.
     *
     * @var \CachetHQ\Cachet\Models\User
     */
    public $user;

    /**
     * The monitor that was added.
     *
     * @var \CachetHQ\Cachet\Models\Monitor
     */
    public $monitor;

    /**
     * Create a new metric was added event instance.
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
        return 'Monitor was added.';
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
