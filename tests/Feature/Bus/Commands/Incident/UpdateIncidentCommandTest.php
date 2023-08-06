<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Feature\Bus\Commands\Incident;

use Tests\Traits\CommandTrait;
use CachetHQ\Cachet\Bus\Commands\Incident\UpdateIncidentCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\Incident\UpdateIncidentCommandHandler;
use CachetHQ\Cachet\Models\Incident;
use Tests\TestCase as AbstractTestCase;

/**
 * This is the update incident command test class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
class UpdateIncidentCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = [
            'incident'         => new Incident(),
            'name'             => 'Test',
            'status'           => 1,
            'message'          => 'Foo bar baz',
            'visible'          => 1,
            'component_id'     => 1,
            'component_status' => 1,
            'notify'           => false,
            'stickied'         => false,
            'occurred_at'      => null,
            'template'         => null,
            'template_vars'    => [],
        ];

        $object = new UpdateIncidentCommand(
            $params['incident'],
            $params['name'],
            $params['status'],
            $params['message'],
            $params['visible'],
            $params['component_id'],
            $params['component_status'],
            $params['notify'],
            $params['stickied'],
            $params['occurred_at'],
            $params['template'],
            $params['template_vars']
        );

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return true;
    }

    protected function getHandlerClass()
    {
        return UpdateIncidentCommandHandler::class;
    }
}
