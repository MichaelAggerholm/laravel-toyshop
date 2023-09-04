@extends('layouts.master')
@section('title', 'Checkout')
@section('content')

    <header class="page-header">
        <h1>Betaling</h1>
        <h3 class="cart-amount" style="border-bottom: 1px solid #fff">Total: {{\App\Models\Cart::totalAmount()}} Kr.</h3>
    </header>

    <main class="checkout-page">
        <div class="container">

            <div class="checkout-form">
                <form action="" id="payment-form" method="post">
                    @csrf

                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="@error('name') has-error @enderror" placeholder="John Doe" value="{{old('name') ? old('name') : auth()->user()->name}}">
                        @error('name')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="JohnDoe@sol.dk" value="{{old('email') ? old('email') : auth()->user()->email}}">
                        @error('email')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="@error('phone') has-error @enderror" placeholder="12 34 56 78" value="{{old('phone')}}">
                        @error('phone')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" class="@error('address') has-error @enderror" placeholder="Vimmersvej 123" value="{{old('address')}}">
                        @error('address')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="zipcode">Postnummer</label>
                        <input type="text" id="zipcode" name="zipcode" class="@error('zipcode') has-error @enderror" placeholder="1234" value="{{old('zipcode')}}">
                        @error('zipcode')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="city">By</label>
                        <input type="text" id="city" name="city" class="@error('city') has-error @enderror" placeholder="Bumleby" value="{{old('city')}}">
                        @error('city')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="country">Country</label>
                        <select name="country" id="country">
                            <option value="">-- Vælg land --</option>
                            <option value="Denmark">-- Vælg land --</option>
                            <option value="Norway">Norway</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Germany">Germany</option>
                        </select>
                        @error('country')
                        <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                </form>
            </div>

        </div>
    </main>

@endsection
