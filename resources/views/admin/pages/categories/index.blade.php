@extends('layouts.admin')
@section('title', 'Categories')
@section('content')

    <h1 class="page-title">Categories</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.category.store')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" />
                                @error('name')
                                <span class="invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                                @enderror
                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
