@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <section class="login-page">
        <div class="login-form-box">
            <div class="login-title">Register</div>
            <div class="login-form">
                <form action="" method="post">

                    <div class="field">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="John Doe" required>
                    </div>
                    
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="John@gmail.com" required>
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="********" required>
                    </div>

                    <div class="field">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" required>
                    </div>

                    <div class="field">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection