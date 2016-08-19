@extends('layouts.app')

@section('content')
<div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green"></i>
                                            <span class="caption-subject font-green bold uppercase">Bar Chart</span>
                                        </div>
                                        <div class="actions">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-cloud-upload"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-wrench"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="morris_chart_3" style="height:500px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
</div>



@endsection
@section('scripts')
<script src="/assets/pages/scripts/charts-morris.min.js" type="text/javascript"></script>
@endsection