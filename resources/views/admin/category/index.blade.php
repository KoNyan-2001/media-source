@extends('admin.master')
@section('title', 'cat-index')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                
                <h3 class="btn btn-info">Category</h3>
                
                <a href="{{ route('categories.create') }}"><h3 class="float-end btn btn-primary">Add Category</h3></a>
                @if ($message = Session::get('message'))
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                          @foreach ($categories as $category)
                          <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    
                                <a href="{{ url('admin/categories/' . $category->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete!')">Delete</button>
                                </form>
                            </td>
                        </tr>
                          @endforeach
                        
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>

@endsection