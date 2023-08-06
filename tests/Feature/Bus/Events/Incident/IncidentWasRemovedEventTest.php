<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Events\Incident;

use CachetHQ\Cachet\Bus\Events\Incident\IncidentWasRemovedEvent;
use CachetHQ\Cachet\Models\Incident;
use CachetHQ\Cachet\Models\User;

/**
 * This is the incident was removed event test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class IncidentWasRemovedEventTest extends AbstractIncidentEventTestCase
{
    protected function objectHasHandlers()
    {
        return false;
    }

    protected function getObjectAndParams()
    {
        $params = ['user' => new User(), 'incident' => new Incident()];
        $object = new IncidentWasRemovedEvent($params['user'], $params['incident']);

        return compact('params', 'object');
    }
}
