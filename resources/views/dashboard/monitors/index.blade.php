@extends('layout.dashboard')

@section('content')
<div class="content-panel">
    @includeWhen(isset($sub_menu), 'dashboard.partials.sub-sidebar')
    <div class="content-wrapper">
        <div class="header sub-header">
            <span class="uppercase">
                <i class="ion ion-ios-heart-outline"></i> {{ trans('dashboard.monitors.monitors') }}
            </span>
            <a class="btn btn-md btn-success pull-right" href="{{ cachet_route('dashboard.monitors.create') }}">
                {{ trans('dashboard.monitors.add.title') }}
            </a>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('partials.errors')
                <div class="striped-list">
                    @forelse($monitors as $monitor)
                    <div class="row striped-list-item">
                        <div class="col-md-6">
                            <strong>{{ $monitor->name }}</strong>
                            @if($monitor->description)
                            <p><small>{{ Str::words($monitor->description, 5) }}</small></p>
                            @endif
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ cachet_route('dashboard.monitors.edit', [$monitor->uuid]) }}" class="btn btn-default">{{ trans('forms.edit') }}</a>
                            <a href="{{ cachet_route('dashboard.monitors.delete', [$monitor->uuid], 'delete') }}" class="btn btn-danger confirm-action" data-method='DELETE'>{{ trans('forms.delete') }}</a>
                        </div>
                    </div>
                    @empty
                    <div class="list-group-item text-danger">{{ trans('dashboard.monitors.add.message') }}</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@stop
