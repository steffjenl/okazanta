<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Commands\Subscriber;

use Tests\Traits\CommandTrait;
use CachetHQ\Cachet\Bus\Commands\Subscriber\SubscribeSubscriberCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\Subscriber\SubscribeSubscriberCommandHandler;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the subscribe subscriber command test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class SubscribeSubscriberCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = ['email' => 'support@cachethq.io', 'verified' => true, 'subscriptions' => null];
        $object = new SubscribeSubscriberCommand($params['email'], $params['verified'], $params['subscriptions']);

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return true;
    }

    protected function getHandlerClass()
    {
        return SubscribeSubscriberCommandHandler::class;
    }
}
