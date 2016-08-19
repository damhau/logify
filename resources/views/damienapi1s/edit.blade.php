@extends('layouts.app')

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-equalizer font-red-sunglo"></i>
            <span class="caption-subject font-red-sunglo bold uppercase">damienapi1</span>
        </div>
    </div>
    <div>
        @include('metronic-templates::common.errors')
    </div>
    <div class="portlet-body form">
        <div class="row">
           {!! Form::model($damienapi1, ['route' => ['damienapi1s.update', $damienapi1->id], 'method' => 'patch']) !!}

            @include('damienapi1s.fields')

           {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection