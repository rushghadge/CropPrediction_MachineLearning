

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
<b></h1>Recommended Crops:</h1></b>
</br>
Crop 1: {{ $c1 }}
</br>
Crop 2:{{ $c2 }}
</br>
Crop 3: {{ $c3 }}








                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
