<!-- Es Cluster Field -->
<div class="form-group col-sm-6">
    {!! Form::label('es_cluster', 'Es Cluster:') !!}
    {!! Form::text('es_cluster', null, ['class' => 'form-control']) !!}
</div>

<!-- Logify Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logify_name', 'Logify Name:') !!}
    {!! Form::text('logify_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Vip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('VIP', 'Vip:') !!}
    {!! Form::text('VIP', null, ['class' => 'form-control']) !!}
</div>

<!-- Ip Public Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip_public', 'Ip Public:') !!}
    {!! Form::text('ip_public', null, ['class' => 'form-control']) !!}
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
