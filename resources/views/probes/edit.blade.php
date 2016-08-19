@extends('layouts.app')

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">Probe</span>
        </div>
    </div>
    <div>
        @include('metronic-templates::common.errors')
    </div>
    <div class="portlet-body form">
        <div class="row">
           {!! Form::model($probe, ['route' => ['probes.update', $probe->id], 'method' => 'patch']) !!}

            @include('probes.fields')

           {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection