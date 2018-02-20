<div class="form-group {{ $errors->has('pH') ? 'has-error' : ''}}">
    {!! Form::label('pH', 'Ph', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pH', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('pH', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Month') ? 'has-error' : ''}}">
    {!! Form::label('Month', 'Month', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Month', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('Month', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Temperature') ? 'has-error' : ''}}">
    {!! Form::label('Temperature', 'Temperature', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Temperature', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('Temperature', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
