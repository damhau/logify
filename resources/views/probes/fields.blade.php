<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Ip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Ip', 'Ip:') !!}
    {!! Form::text('Ip', null, ['class' => 'form-control']) !!}
</div>

<!-- Input Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Input', 'Input:') !!}
    {!! Form::textarea('Input', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Filter Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('FIlter', 'Filter:') !!}
    {!! Form::textarea('FIlter', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Output Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Output', 'Output:') !!}
    {!! Form::textarea('Output', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('probes.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
