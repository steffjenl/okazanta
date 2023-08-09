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

use CachetHQ\Cachet\Bus\Commands\Monitor\RemoveMonitorCommand;
use CachetHQ\Cachet\Bus\Events\Monitor\MonitorWasRemovedEvent;
use CachetHQ\Cachet\Models\Monitor;
use Illuminate\Contracts\Auth\Guard;

class RemoveMonitorCommandHandler
{
    /**
     * The authentication guard instance.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new remove monitor command handler instance.
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
     * Handle the remove monitor command.
     *
     * @param \CachetHQ\Cachet\Bus\Commands\Monitor\RemoveMonitorCommand $command
     *
     * @return void
     */
    public function handle(RemoveMonitorCommand $command)
    {
        $monitor = $command->monitor;

        event(new MonitorWasRemovedEvent($this->auth->user(), $monitor));

        $monitor->delete();
    }
}
