@extends('layouts.master')
@section('title', 'wishlist')
@section('content')
    <header class="page-header">
        <h1>Ønskeliste</h1>
    </header>


            @if($products->count())
                <div class="container" style="margin-top: 70px;">
                    <div class="products-row">
                        @foreach($products as $product)
                            <x-product-box :product="$product" />
                        @endforeach
                    </div>
                </div>
                @else
                <h5 style="text-align: center; margin-top: 50px;">Du har ingen produkter på din ønskeliste</h5>
            @endif
@endsection
