<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Commands\IncidentUpdate;

use Tests\Traits\CommandTrait;
use CachetHQ\Cachet\Bus\Commands\IncidentUpdate\RemoveIncidentUpdateCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\IncidentUpdate\RemoveIncidentUpdateCommandHandler;
use CachetHQ\Cachet\Models\IncidentUpdate;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the remove incident update command test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class RemoveIncidentUpdateCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = ['incidentUpdate' => new IncidentUpdate()];
        $object = new RemoveIncidentUpdateCommand($params['incidentUpdate']);

        return compact('params', 'object');
    }

    protected function getHandlerClass()
    {
        return RemoveIncidentUpdateCommandHandler::class;
    }
}
