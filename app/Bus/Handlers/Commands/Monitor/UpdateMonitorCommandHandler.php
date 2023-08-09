<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Handlers\Commands\Monitor;

use CachetHQ\Cachet\Bus\Commands\Monitor\UpdateMonitorCommand;
use CachetHQ\Cachet\Bus\Events\Monitor\MonitorWasUpdatedEvent;
use CachetHQ\Cachet\Models\Monitor;
use Illuminate\Contracts\Auth\Guard;

class UpdateMonitorCommandHandler
{
    /**
     * The authentication guard instance.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new update metric command handler instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle the update metric command.
     *
     * @param \CachetHQ\Cachet\Bus\Commands\Monitor\UpdateMonitorCommand $command
     *
     * @return \CachetHQ\Cachet\Models\Monitor
     */
    public function handle(UpdateMonitorCommand $command)
    {
        $monitor = $command->monitor;

        $monitor->update($this->filter($command));

        event(new MonitorWasUpdatedEvent($this->auth->user(), $monitor));

        return $monitor;
    }

    /**
     * Filter the command data.
     *
     * @param \CachetHQ\Cachet\Bus\Commands\Monitor\UpdateMonitorCommand $command
     *
     * @return array
     */
    protected function filter(UpdateMonitorCommand $command)
    {
        $params = [
            'name'          => $command->name,
        ];

        return array_filter($params, function ($val) {
            return $val !== null;
        });
    }
}
