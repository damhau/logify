@extends('layouts.app')

@section('content')
 <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-red-sunglo"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">provision</span>
            </div>
        </div>
        <div>
            @include('metronic-templates::common.errors')
        </div>
        <div class="portlet-body form">
            <div class="row">
                {!! Form::open(['route' => 'provisions.store']) !!}

<!-- Es Cluster Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_cluster', 'Es Cluster:') !!}
    {!! Form::text('es_cluster', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('provisions.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>

                 {!! Form::close() !!}
            </div>
        </div>
  </div>
@endsection
