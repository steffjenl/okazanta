<?php

namespace CachetHQ\Cachet\Http\Routes\Dashboard;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the dashboard metric routes class.
 *
 * @author Stephan Eizinga <stephan@monkeysoft.nl>
 */
class MonitorRoutes
{
    /**
     * Defines if these routes are for the browser.
     *
     * @var bool
     */
    public static $browser = true;

    /**
     * Define the dashboard metric routes.
     *
     * @param \Illuminate\Contracts\Routing\Registrar $router
     *
     * @return void
     */
    public function map(Registrar $router)
    {
        $router->group([
            'middleware' => ['auth'],
            'namespace'  => 'Dashboard',
            'prefix'     => 'dashboard/monitors',
        ], function (Registrar $router) {
            $router->get('/', [
                'as'   => 'get:dashboard.monitors',
                'uses' => 'MonitorController@showMonitors',
            ]);

            $router->get('create', [
                'as'   => 'get:dashboard.monitors.create',
                'uses' => 'MonitorController@showAddMonitor',
            ]);
            $router->post('create', [
                'as'   => 'post:dashboard.monitors.create',
                'uses' => 'MonitorController@createMonitorAction',
            ]);

            $router->get('{monitor}', [
                'as'   => 'get:dashboard.monitors.edit',
                'uses' => 'MonitorController@showEditMonitorAction',
            ]);
            $router->post('{monitor}', [
                'as'   => 'post:dashboard.monitors.edit',
                'uses' => 'MonitorController@editMonitorAction',
            ]);
            $router->delete('{monitor}', [
                'as'   => 'delete:dashboard.monitors.delete',
                'uses' => 'MonitorController@deleteMonitorAction',
            ]);
        });
    }
}
