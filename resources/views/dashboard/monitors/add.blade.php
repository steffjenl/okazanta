@extends('layout.dashboard')

@section('content')
<div class="header">
    <div class="sidebar-toggler visible-xs">
        <i class="ion ion-navicon"></i>
    </div>
    <span class="uppercase">
        <i class="ion ion-ios-heart-outline"></i> {{ trans('dashboard.monitors.monitors') }}
    </span>
    > <small>{{ trans('dashboard.monitors.add.title') }}</small>
</div>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            @include('partials.errors')
            <form class="form-vertical" name="MetricsForm" role="form" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <div class="form-group">
                        <label for="monitor-name">{{ trans('forms.monitors.name') }}</label>
                        <input type="text" class="form-control" name="monitor[name]" id="monitor-name" required value="{{ Binput::old('monitor.name') }}" placeholder="{{ trans('forms.monitors.name') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('forms.monitors.description') }}</label>
                        <div class='markdown-control'>
                            <textarea name="monitor[description]" class="form-control" rows="5" placeholder="{{ trans('forms.monitors.description') }}">{{ Binput::old('monitor.description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ trans('forms.monitors.monitor_type.name') }}</label>
                        <select name="monitor[monitor_type]" class="form-control" required>
                            <option value="0" selected>{{ trans('forms.monitors.monitor_type.option.http') }}</option>
                            <option value="1">{{ trans('forms.monitors.monitor_type.option.ping') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monitor-interval">{{ trans('forms.monitors.interval') }}</label>
                        <input type="number" class="form-control" name="monitor[interval]" id="metric-interval" value="{{ Binput::old('metric.interval', '1') }}" placeholder="{{ trans('forms.monitors.interval') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="monitor-retries">{{ trans('forms.monitors.retries') }}</label>
                        <input type="number" class="form-control" name="monitor[retries]" id="metric-retries" value="{{ Binput::old('metric.retries', '5') }}" placeholder="{{ trans('forms.monitors.retries') }}" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="monitor-monitor_url">{{ trans('forms.monitors.monitor_url') }}</label>
                        <input type="text" class="form-control" name="monitor[monitor_url]" id="monitor-monitor_url" required value="{{ Binput::old('monitor.monitor_url') }}" placeholder="{{ trans('forms.monitors.monitor_url') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('forms.monitors.monitor_method.name') }}</label>
                        <select name="monitor[monitor_method]" class="form-control">
                            <option value="0" selected>{{ trans('forms.monitors.monitor_method.option.get') }}</option>
                            <option value="1">{{ trans('forms.monitors.monitor_method.option.post') }}</option>
                            <option value="2">{{ trans('forms.monitors.monitor_method.option.put') }}</option>
                            <option value="3">{{ trans('forms.monitors.monitor_method.option.delete') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ trans('forms.monitors.monitor_authentication.name') }}</label>
                        <select name="monitor[monitor_authentication]" class="form-control">
                            <option value="0" selected>{{ trans('forms.monitors.monitor_authentication.option.0') }}</option>
                            <option value="1">{{ trans('forms.monitors.monitor_authentication.option.1') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monitor-monitor_username">{{ trans('forms.monitors.monitor_username') }}</label>
                        <input type="text" class="form-control" name="monitor[monitor_username]" id="monitor-monitor_username" value="{{ Binput::old('monitor.monitor_username') }}" placeholder="{{ trans('forms.monitors.monitor_username') }}">
                    </div>
                    <div class="form-group">
                        <label for="monitor-monitor_password">{{ trans('forms.monitors.monitor_password') }}</label>
                        <input type="password" class="form-control" name="monitor[monitor_password]" id="monitor-monitor_password" value="{{ Binput::old('monitor.monitor_password') }}" placeholder="{{ trans('forms.monitors.monitor_password') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('forms.monitors.monitor_body_type.name') }}</label>
                        <select name="monitor[monitor_body_type]" class="form-control">
                            <option value="0" selected>{{ trans('forms.monitors.monitor_body_type.option.json') }}</option>
                            <option value="1">{{ trans('forms.monitors.monitor_body_type.option.xml') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ trans('forms.monitors.monitor_body') }}</label>
                        <div class='text-control'>
                            <textarea name="monitor[monitor_body]" class="form-control" rows="5" placeholder="{{ trans('forms.monitors.monitor_body') }}">{{ Binput::old('monitor.monitor_body') }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>{{ trans('forms.monitors.expected_response_type.name') }}</label>
                        <select name="monitor[expected_response_type]" class="form-control">
                            <option value="0" selected>{{ trans('forms.monitors.expected_response_type.option.json') }}</option>
                            <option value="1">{{ trans('forms.monitors.expected_response_type.option.xml') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ trans('forms.monitors.expected_response') }}</label>
                        <div class='text-control'>
                            <textarea name="monitor[expected_response]" class="form-control" rows="5" placeholder="{{ trans('forms.monitors.expected_response') }}">{{ Binput::old('monitor.expected_response') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="monitor-expected_status_code">{{ trans('forms.monitors.expected_status_code') }}</label>
                        <input type="text" class="form-control" name="monitor[expected_status_code]" id="monitor-expected_status_code" value="{{ Binput::old('monitor.expected_status_code') }}" placeholder="{{ trans('forms.monitors.expected_status_code') }}">
                    </div>
                </fieldset>
                <div class="form-group">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">{{ trans('forms.add') }}</button>
                        <a class="btn btn-default" href="{{ cachet_route('dashboard.monitors') }}">{{ trans('forms.cancel') }}</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@stop
