<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Username', 'Username:') !!}
    {!! Form::text('Username', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Password', 'Password:') !!}
    {!! Form::password('Password', ['class' => 'form-control']) !!}
</div>

<!-- Roles Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Roles', 'Roles:') !!}
    {!! Form::select('Roles', ['SG_Admin' => 'SG_Admin', 'SG_Read-Only' => 'SG_Read-Only'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
