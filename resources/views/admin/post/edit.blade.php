@extends('admin.master')
@section('title', 'post-edit')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="btn btn-info pb-3">Create Post</h3>
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group pb-3">
                        <label for="title">title</label>
                        <input type="text" name="title" value="{{ old('title') ?? $post->title }}" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <p class="text-danger"> <small> {{ $message }} </small> </p>
                        @enderror
                    </div>

                    <div class="form-group pb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="" class="form-select form-control @error('category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger"> <small> {{ $message }} </small> </p>
                        @enderror
                    </div>

                    <div class="form-group pb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                        <br>
                        <img src="{{ asset('storage/post_images/'.$post->image) }}" style="border:1px solid green;" alt="" width="100px" height="100px">
                        @error('image')
                        <p class="text-danger"> <small> {{ $message }} </small> </p>
                        @enderror
                    </div>

                    <div class="form-group pb-3">
                        <label for="content">Content</label>
                        <textarea name="content" id="" cols="" rows="" class="form-control @error('content') is-invalid @enderror">{{ old('content') ?? $post->content }}</textarea>
                        @error('content')
                        <p class="text-danger"> <small> {{ $message }} </small> </p>
                        @enderror
                    </div>
    
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection