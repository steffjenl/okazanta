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
