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
                    <div class="panel-heading">Profile {{ $profile->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/profile/profiles') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/profile/profiles/' . $profile->id . '/edit') }}" title="Edit Profile"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['profile/profiles', $profile->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Profile',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $profile->id }}</td>
                                    </tr>
                                    <tr><th> Jilla </th><td> {{ $profile->Jilla }} </td></tr><tr><th> Taluka </th><td> {{ $profile->Taluka }} </td></tr><tr><th> Phone </th><td> {{ $profile->Phone }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
