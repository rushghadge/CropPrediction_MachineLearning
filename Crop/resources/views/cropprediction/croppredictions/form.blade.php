<div class="form-group {{ $errors->has('pH') ? 'has-error' : ''}}">
    {!! Form::label('pH', 'Ph', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('pH', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('pH', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('temperature') ? 'has-error' : ''}}">
    {!! Form::label('temperature', 'Temperature', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('temperature', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('temperature', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
