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
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Your application's dashboard.
                    <a href="{{ url('/temp') }}">Click to see Temperature</a>
                     

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
