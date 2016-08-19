<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Indices Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Indices', 'Indices:') !!}
    {!! Form::textarea('Indices', null, ['class' => 'form-control', 'rows' => '5']) !!}
</div>

<!-- Permissions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Permissions', 'Permissions:') !!}
    {!! Form::select('Permissions', ['ALL' => 'ALL', 'WRITE' => 'WRITE', 'READ' => 'READ', 'DELETE' => 'DELETE', 'CRUD' => 'CRUD'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
