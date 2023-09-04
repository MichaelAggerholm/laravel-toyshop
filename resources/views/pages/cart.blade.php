@extends('layouts.master')
@section('title', 'cart')
@section('content')

    <header class="page-header">
        <h1>Kurv</h1>
        <h3 class="cart-amount" style="border-bottom: 1px solid #fff">Total: {{\App\Models\Cart::totalAmount()}} Kr.</h3>
    </header>

    <main class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(session()->has('cart') && count(session()->get('cart')) > 0)
                            @foreach(session()->get('cart') as $key => $item)
                                <tr>
                                    <td>
                                        <a href="{{route('product', $item['product']['id'])}}" class="cart-item-title">
                                            <img src="{{asset('storage/' . $item['product']['image'])}}" alt="{{$item['product']['title']}}">
                                            <p>{{$item['product']['title']}}</p>
                                        </a>
                                    </td>
                                    <td>{{$item['color']['name']}}</td>
                                    <td>{{$item['product']['price']}} kr.</td>
                                    <td>{{$item['quantity']}}</td>
                                    <td>{{App\Models\Cart::unitPrice($item)}} kr.</td>
                                    <td>
                                        <form action="" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">X</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <tr class="cart-total">
                                <td colspan="4" style="text-align: right;">Total:</td>
                                <td>{{\App\Models\Cart::totalAmount()}} kr.</td>
                            </tr>

                            @else
                            <tr>
                                <td colspan="6" class="empty-cart">Kurven er tom.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="cart-actions">
                <a href="#" class="btn btn-primary">Til betaling</a>
            </div>

        </div>
    </main>

@endsection
