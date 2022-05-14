@extends('admin.master')
@section('title', 'posts')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="btn btn-info">Posts</h3>
                <a href="{{ route('posts.create') }}"><h3 class="float-end btn btn-primary">Create Post</h3></a>
                
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td><img src="{{ asset('storage/post_images/'.$post->image) }}" alt="" width="100px" height=""></td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        
                                    <a href="{{ route('posts.edit',$post->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete!')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                       
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>


@endsection
