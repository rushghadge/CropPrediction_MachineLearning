
@extends('waterresource.master')
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
            <div class="panel panel-default" align="left">
                <div class="panel-heading">Water Resource Information!</div>


    
    <div id="map" style="width: 650px" align="left" >
    </div> 
    <br>
        {!! Form::open(['url'=>'/getLocationCoords','id'=>'searchGirls']) !!}

        {!! Form::label('district','District') !!}

         {{-- {!!Form::select('district', $districts,null,['id'=>'district']) !!} --}}
        <select id="locationSelect" name="location" style="width: 150px">
        </select>
       

        {!! Form::close() !!}
        <br>
            <h4>
Nearby Water Resources:         </h4>
            <hr>
                <ul id="girlsResult">
                </ul>
            </hr>
        </br>
    </br>
</div> <!-- panel panel-de -->

</div> <!-- col 9 -->



@endsection




</div> <!-- col 9 -->

</div> <!-- col 9 -->

