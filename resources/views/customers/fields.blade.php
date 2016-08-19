<!-- Logify Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logify_id', 'Logify Id:') !!}
    {!! Form::text('logify_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="form-actions">
        <div class="row  col-md-offset-0">
            {!! Form::submit('Save', ['class' => 'btn green']) !!}
            <a href="{!! route('customers.index') !!}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
