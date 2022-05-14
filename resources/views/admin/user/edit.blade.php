@extends('admin.master')
@section('title', 'users')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="pb-3 btn btn-info">Edit Users</h5>
                <form action="{{ url('admin/users/' .$user->id. '/update') }}" method="POST">
                    @csrf
                    <div class="form-group pb-3">
                        <label for="forName">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>

                    <div class="form-group pb-3">
                        <label for="forEmail">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>
                    
                    <div class="form-group pb-3">
                        <label for="forStatus">Status</label>
                        <select name="status" id="" class="form-select">
                            
                            <option value="admin" @if ($user->name == 'admin') selected @endif>Admin</option>
                            <option value="user" @if ($user->name == 'user') selected @endif>User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection