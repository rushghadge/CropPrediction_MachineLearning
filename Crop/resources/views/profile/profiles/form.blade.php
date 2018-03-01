<div class="form-group {{ $errors->has('Jilla') ? 'has-error' : ''}}">
    {!! Form::label('Jilla', 'Jilla', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Jilla', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('Jilla', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Taluka') ? 'has-error' : ''}}">
    {!! Form::label('Taluka', 'Taluka', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Taluka', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('Taluka', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Phone') ? 'has-error' : ''}}">
    {!! Form::label('Phone', 'Phone', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Phone', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('Phone', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('State') ? 'has-error' : ''}}">
    {!! Form::label('State', 'State', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('State', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('State', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Country') ? 'has-error' : ''}}">
    {!! Form::label('Country', 'Country', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('Country', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('Country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
