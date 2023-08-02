@extends('layouts.master')
@section('title', $product->title)
@section('content')

    <div class="product-page">
        <div class="container">
            <div class="product-page-row">
                <section class="product-page-image mt-3">
                    <img src="{{asset('storage/' . $product->image)}}" alt="{{$product->title . ' image'}}" height="150" width="150">
                </section>
                <section class="product-page-details">
                    <p class="p-title">{{$product->title}}</p>
                    <p class="p-price">{{$product->price}} Dkk,-</p> {{--TODO: Skal muligvis divideres med 100 pga. betalingsopsætning--}}
                    <p class="p-category">- {{$product->category->name}}</p>
                    <p class="p-description">{{$product->description}}</p>
                    <form action="" method="post">
                        @csrf
                        <div class="p-form">
                            <div class="p-colors">
                                <label for="color">Farve</label>
                                <select name="color" id="color">
                                    <option value="">-- Farve</option>
                                    @foreach($product->colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="p-quantity">
                                <label for="quantity">Antal</label>
                                <input type="number" name="quantity" id="quantity" min="1" max="100" value="1" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-cart">Tilføj til kurv</button>
                    </form>
                </section>
            </div>
        </div>
    </div>

@endsection
