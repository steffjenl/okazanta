<?php

namespace CachetHQ\Cachet\Http\Controllers\Dashboard;

use AltThree\Validator\ValidationException;
use CachetHQ\Cachet\Bus\Commands\Monitor\CreateMonitorCommand;
use CachetHQ\Cachet\Bus\Commands\Monitor\RemoveMonitorCommand;
use CachetHQ\Cachet\Bus\Commands\Monitor\UpdateMonitorCommand;
use CachetHQ\Cachet\Models\Monitor;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class MonitorController extends Controller
{
    /**
     * Shows the metrics view.
     *
     * @return \Illuminate\View\View
     */
    public function showMonitors()
    {
        $monitors = Monitor::orderBy('name')->get();

        return View::make('dashboard.monitors.index')
            ->withPageTitle(trans('dashboard.monitors.monitors').' - '.trans('dashboard.dashboard'))
            ->withMonitors($monitors);
    }

    /**
     * Shows the add metric view.
     *
     * @return \Illuminate\View\View
     */
    public function showAddMonitor()
    {
        return View::make('dashboard.monitors.add')
            ->withPageTitle(trans('dashboard.monitors.add.title').' - '.trans('dashboard.dashboard'));
    }

    /**
     * Creates a new metric.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createMonitorAction()
    {
        $metricData = Binput::get('monitor');

        try {
            execute(new CreateMonitorCommand(
                $metricData['name']
            ));
        } catch (ValidationException $e) {
            return cachet_redirect('dashboard.monitors.create')
                ->withInput(Binput::all())
                ->withTitle(sprintf('%s %s', trans('dashboard.notifications.whoops'), trans('dashboard.monitors.add.failure')))
                ->withErrors($e->getMessageBag());
        }

        return cachet_redirect('dashboard.monitors')
            ->withSuccess(sprintf('%s %s', trans('dashboard.notifications.awesome'), trans('dashboard.monitors.add.success')));
    }

    /**
     * Deletes a given metric.
     *
     * @param \CachetHQ\Cachet\Models\Monitor $monitor
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteMonitorAction(Monitor $monitor)
    {
        execute(new RemoveMonitorCommand($monitor));

        return cachet_redirect('dashboard.monitors')
            ->withSuccess(sprintf('%s %s', trans('dashboard.notifications.awesome'), trans('dashboard.monitors.delete.success')));
    }

    /**
     * Shows the edit metric view.
     *
     * @param \CachetHQ\Cachet\Models\Monitor $monitor
     *
     * @return \Illuminate\View\View
     */
    public function showEditMonitorAction(Monitor $monitor)
    {
        return View::make('dashboard.monitors.edit')
            ->withPageTitle(trans('dashboard.monitors.edit.title').' - '.trans('dashboard.dashboard'))
            ->withMonitor($monitor);
    }

    /**
     * Edit an metric.
     *
     * @param \CachetHQ\Cachet\Models\Monitor $monitor
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editMonitorAction(Monitor $monitor)
    {
        try {
            execute(new UpdateMonitorCommand(
                $monitor,
                Binput::get('name', null, false)
            ));
        } catch (ValidationException $e) {
            return cachet_redirect('dashboard.monitors.edit', [$monitor->uuid])
                ->withInput(Binput::all())
                ->withTitle(sprintf('<strong>%s</strong>', trans('dashboard.notifications.whoops')))
                ->withErrors($e->getMessageBag());
        }

        return cachet_redirect('dashboard.monitors.edit', [$monitor->uuid])
            ->withSuccess(sprintf('%s %s', trans('dashboard.notifications.awesome'), trans('dashboard.monitors.edit.success')));
    }
}
