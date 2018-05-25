@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
             @if(Auth::check() && Auth::user()->hasRole('admin')) {
            @include('admin.sidebar')
            @else
            @include('user.sidebar')
            @endif

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Enter Crop details for Prediction</div>
                    <div class="panel-body">
                        <a href="{{ url('/cropprediction/croppredictions') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

<form class="form-horizontal" method="post" action="/crop">
      {{ csrf_field() }}
<div class="form-group">
    <label for="name" class="col-lg-2 control-label">
        pH
    </label>
    <div class="col-lg-10">
        <input type="number" min="0" max="14"step="any" class="form-control" id="ph" name="ph" >
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-lg-2 control-label">
        Temperature
    </label>
    <div class="col-lg-10">
        <input type="number" class="form-control" id="temperature" name="temperature"  >
    </div>
</div>
<div class="form-group">
    <label for="month" class="col-lg-2 control-label">
        Month
    </label>
    <div class="col-lg-10">
        <input type="number" min="1" max="12" class="form-control" id="month" name="month">
    </div>
</div>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Predict</button>

    </div>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
