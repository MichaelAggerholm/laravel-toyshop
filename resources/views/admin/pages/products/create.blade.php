@extends('layouts.admin')
@section('title', 'Create product')
@section('content')
    <h1 class="page-title">Create Product</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Product</h5>
                    </div>
                    <div class="card-body">
                        {{--multipart/form-data er vigtigt i denne form, da man ellers ikke vil kunne uploade en fil--}}
                        <form action="{{route('adminpanel.products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{--Row 1--}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{old('title')}}"/>
                                        @error('title')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="price">price</label>
                                        <input type="number" name="price" id="price"
                                               class="form-control @error('price') is-invalid @enderror"
                                               value="{{old('price')}}"/>
                                        @error('price')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{--Row 2--}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id"
                                                class="form-control @error('category_id') is_invalid @enderror">
                                            <option value="">-- Select Category --</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>
                                                    {{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image"
                                               class="form-control @error('image') is_invalid @enderror"/>
                                        @error('category_id')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{--Row 3--}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="colors">Colors </label> &nbsp; &nbsp;
                                        @foreach($colors as $color)
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="colors[]" class="form-check-input"
                                                       id="{{$color->name}}" value="{{$color->id}}"/>
                                                <label for="{{$color->name}}"
                                                       class="form-check-label">{{$color->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            {{--Row 4--}}
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description </label>
                                        <textarea name="description" id="description" cols="30" rows="10"
                                                  class="form-control @error('description') is_invalid @enderror"
                                                  placeholder="Describe your product..">
                                            {{old('description')}}
                                        </textarea>
                                        @error('description')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
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
