@extends('admin.master')
@section('title', 'cat-edit')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="btn btn-info pb-3">Edit Category</h3>
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group pb-3">
                        <label for="forName">Category</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') ?? $category->name }}">
                    </div>
    
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection