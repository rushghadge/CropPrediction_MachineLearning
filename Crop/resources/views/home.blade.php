@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

          @if(Auth::check() && Auth::user()->hasRole('admin')) {
            @include('admin.sidebar')
            @else
            @include('user.sidebar')
            @endif
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                     </br>
                    <a href="{{ url('/temp') }}">Click to see Temperature</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
