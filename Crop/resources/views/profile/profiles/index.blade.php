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
                    <div class="panel-heading">Profiles</div>
                    <div class="panel-body">
                        <a href="{{ url('/profile/profiles/create') }}" class="btn btn-success btn-sm" title="Add New Profile">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/profile/profiles', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Jilla</th><th>Taluka</th><th>Phone</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($profiles as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->Jilla }}</td><td>{{ $item->Taluka }}</td><td>{{ $item->Phone }}</td>
                                        <td>
                                            <a href="{{ url('/profile/profiles/' . $item->id) }}" title="View Profile"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/profile/profiles/' . $item->id . '/edit') }}" title="Edit Profile"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/profile/profiles', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Profile',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $profiles->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
