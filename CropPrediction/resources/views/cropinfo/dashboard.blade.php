
<?php
//var temp1;
?>

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
                <div class="panel-heading">Crop InformTION</div>

                <div class="panel-body">
hellO
{{ HTML::image('images/MHCrops.png') }}
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
