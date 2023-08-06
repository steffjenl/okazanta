@extends('layout.dashboard')

@section('content')
    <div class="content-panel">
        @includeWhen(isset($subMenu), 'dashboard.partials.sub-sidebar')
        <div class="content-wrapper">
            <div class="header sub-header" id="application-setup">
            <span class="uppercase">
                {{ trans('dashboard.settings.widget.widget') }}
            </span>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <p>{!! trans('dashboard.settings.widget.information') !!}</p>
                            <h5>Status message</h5>
                            <p>
                                    <code class="html">
                                        &lt;div id=&quot;statusMessage&quot;&gt;&lt;div class=&quot;statusMessage alert alert-info&quot;&gt;Status widget is loading...&lt;/div&gt;&lt;/div&gt;
                                    </code>
                            </p>

                            <h5>Before &lt;/body&gt;</h5>
                            <p>
                                <code class="html">
                                    &lt;script src=&quot;//{{ str_replace('http://', '', str_replace('https://', '', $config['url'])) }}/widget.js&quot; async&gt;&lt;/script&gt;
                                </code>
                            </p>

                            <hr>

                            <h4>{{ trans('dashboard.settings.widget.example') }}</h4>
                            <div class="form-group">
                                <textarea class="form-control" rows="40">{{ $exampleCode }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
