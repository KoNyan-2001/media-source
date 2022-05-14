@extends('admin.master')
@section('title', 'cat-create')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="btn btn-info pb-3">Create Category</h3>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group pb-3">
                        <label for="name">Category</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger"> <small> {{ $message }} </small> </p>
                        @enderror
                    </div>
    
                    
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection