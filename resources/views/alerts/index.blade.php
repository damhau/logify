@extends('layouts.app')

@section('content')
<div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-red-sunglo"></i>
                <span class="caption-subject font-red-sunglo bold uppercase">Alerts</span>
            </div>
            <h1 class="pull-right">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('alerts.create', ['subdomain' => 'dhc1']) !!}">Add New</a>
            </h1>
        </div>
        @include('flash::message')
        domain {{ $subdomain }}
		<div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('alerts.table')
            </div>
        </div>
 </div>
@endsection

