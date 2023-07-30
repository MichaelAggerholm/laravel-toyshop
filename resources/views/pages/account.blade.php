@extends('layouts.master')
@section('title', 'account')
@section('content')
    <div class="account-page">
        <div class="container">
            @auth
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-primary">Logout</button>
                </form>
            @endauth
        </div>
    </div>
@endsection
