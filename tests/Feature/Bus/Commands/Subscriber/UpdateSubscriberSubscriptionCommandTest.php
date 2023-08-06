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
use CachetHQ\Cachet\Bus\Commands\Subscriber\UpdateSubscriberSubscriptionCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\Subscriber\UpdateSubscriberSubscriptionCommandHandler;
use CachetHQ\Cachet\Models\Subscriber;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the update subscriber subscription command test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class UpdateSubscriberSubscriptionCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = ['subscriber' => new Subscriber(), 'subscriptions' => null];
        $object = new UpdateSubscriberSubscriptionCommand($params['subscriber'], $params['subscriptions']);

        return compact('params', 'object');
    }

    protected function getHandlerClass()
    {
        return UpdateSubscriberSubscriptionCommandHandler::class;
    }
}
