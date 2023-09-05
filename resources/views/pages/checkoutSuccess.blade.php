@extends('layouts.master')
@section('title', 'Checkout Success')
@section('content')

    <header class="page-header">
        <h1>Checkout Success</h1>
    </header>

    <main>
        <div class="container checkoutSuccessContainer">

            <p>Tak! Din ordre er nu gennemført. Du vil modtage en bekræftelse på mail en gang i en ukendt fremtid.</p>
            <a href="{{route('home')}}" class="btn btn-primary">Tilbage til forsiden</a>

        </div>
    </main>

@endsection
