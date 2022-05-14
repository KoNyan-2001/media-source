@extends('admin.master')
@section('title', 'users')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="btn btn-info">Users</h3>
                
                @if ($message = Session::get('ssMsg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        <strong>{{ $message }}</strong>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    </div>
                @endif
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <form action="{{ url('admin/users/'.$user->id.'/destroy') }}" method="POST">
                                        @csrf
                                        
                                    <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete!')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
