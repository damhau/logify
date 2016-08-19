<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Schedule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Schedule', 'Schedule:') !!}
    {!! Form::text('Schedule', null, ['class' => 'form-control']) !!}
</div>

<!-- Dashboard Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Dashboard', 'Dashboard:') !!}
    {!! Form::text('Dashboard', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Email', 'Email:') !!}
    {!! Form::email('Email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('reports.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
