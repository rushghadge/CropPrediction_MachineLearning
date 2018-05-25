
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
                    <ul>
                  <a ><font color="blue"> <u><li onclick="location.href='https://www.sarkariyojna.co.in/tractor-distribution-scheme-launched-assam-double-farmers-income-2022/';">Chief Minister Samagra Gramya Unnayan Yojana (CMSGUY)</font></u></a></li>
                    <a><font color="blue"><u><li onclick="location.href='https://www.sarkariyojna.co.in/new-scheme-monthly-allowance-rs-1500-unemployed-poor/';">New Scheme for Monthly Allowance of Rs. 1500 to Unemployed & Poor</font></u></a></li>

                    </ul>

       
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
