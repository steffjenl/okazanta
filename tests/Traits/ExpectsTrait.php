<?php

declare(strict_types=1);

/*
 * This file is part of Alt Three TestBench.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Traits;

use Exception;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;

/**
 * This is the expects trait.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
trait ExpectsTrait
{
    /**
     * Specify a list of events that should be fired for the given operation.
     *
     * These events will be mocked, so that handlers will not actually be executed.
     *
     * @param string[]|string $events
     *
     * @throws \Exception
     *
     * @return $this
     */
    public function onlyExpectsEvents($events)
    {
        $events = is_array($events) ? $events : func_get_args();

        Event::fake();

        $this->beforeApplicationDestroyed(function () use ($events) {
            foreach($events as $event) {
                Event::assertDispatched($event);
            }
        });

        return $this;
    }

    /**
     * Specify a list of jobs that should be dispatched for the given operation.
     *
     * These jobs will be mocked, so that handlers will not actually be executed.
     *
     * @param string[]|string $jobs
     *
     * @return $this
     */
    protected function onlyExpectsJobs($jobs)
    {
        $jobs = is_array($jobs) ? $jobs : func_get_args();

        $this->beforeApplicationDestroyed(function () use ($jobs) {

            foreach($jobs as $job) {
                Bus::assertDispatched($job);
            }

        });

        return $this;
    }
}
