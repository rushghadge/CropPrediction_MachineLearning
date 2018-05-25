
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
                <div class="panel-heading">Crop Information!</div>

                <div class="panel-body">


<div class="app">
            <center>
                
                {!! $chart->html() !!}
            </center>
        </div>
        <!-- End Of Main Application -->
        {!! Charts::scripts() !!}
        {!! $chart->script() !!}
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
