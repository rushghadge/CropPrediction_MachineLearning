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
                    <div class="panel-heading">Create New Profile</div>
                    <div class="panel-body">
                        <a href="{{ url('/profile/profiles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/profile/profiles', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('profile.profiles.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
