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
                    <div class="panel-heading">Cropprediction {{ $cropprediction->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/cropprediction/croppredictions') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/cropprediction/croppredictions/' . $cropprediction->id . '/edit') }}" title="Edit Cropprediction"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['cropprediction/croppredictions', $cropprediction->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Cropprediction',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cropprediction->id }}</td>
                                    </tr>
                                    <tr><th> PH </th><td> {{ $cropprediction->pH }} </td></tr><tr><th> Temperature </th><td> {{ $cropprediction->temperature }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
