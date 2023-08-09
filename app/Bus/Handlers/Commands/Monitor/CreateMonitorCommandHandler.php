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

use CachetHQ\Cachet\Bus\Commands\Monitor\CreateMonitorCommand;
use CachetHQ\Cachet\Bus\Events\Monitor\MonitorWasCreatedEvent;
use CachetHQ\Cachet\Models\Monitor;
use Illuminate\Contracts\Auth\Guard;

class CreateMonitorCommandHandler
{
    /**
     * The authentication guard instance.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Create a new add metric command handler instance.
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
     * Handle the add metric command.
     *
     * @param \CachetHQ\Cachet\Bus\Commands\Monitor\CreateMonitorCommand $command
     *
     * @return \CachetHQ\Cachet\Models\Monitor
     */
    public function handle(CreateMonitorCommand $command)
    {
        $metric = Monitor::create([
            'name'          => $command->name,
        ]);

        event(new MonitorWasCreatedEvent($this->auth->user(), $metric));

        return $metric;
    }
}
