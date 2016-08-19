<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Index Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Index', 'Index:') !!}
    {!! Form::text('Index', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Type', 'Type:') !!}
    {!! Form::select('Type', ['any' => 'any', 'blacklist' => 'blacklist', 'whitelist' => 'whitelist', 'change' => 'change', 'frequency' => 'frequency', 'spike' => 'spike', '' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Alert Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Alert', 'Alert:') !!}
    {!! Form::select('Alert', ['email' => 'email', 'command' => 'command', 'jira' => 'jira', 'hipchat' => 'hipchat', 'slack' => 'slack', 'servicenow' => 'servicenow', 'victorops' => 'victorops', 'pagerduty' => 'pagerduty'], null, ['class' => 'form-control']) !!}
</div>

<!-- Query Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Query_key', 'Query Key:') !!}
    {!! Form::text('Query_key', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('alerts.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
