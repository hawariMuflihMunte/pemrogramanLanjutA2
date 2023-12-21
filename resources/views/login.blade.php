@extends('layouts.app')
@section('page-title', 'Data Mahasiswa | Login')
@section('content')
    <style>
        body {
            overflow: hidden;
        }

        #formContainer {
            display: flex;
            place-content: center;
            place-items: center;
            background-color: #bcbcbc;
            padding: 30px;
            width: 100%;
            height: 100vh;
        }

        #formContainer > * {
            background-color: #fff;
            padding: 16px;
            max-width: 360px;
            width: 100%;
        }
    </style>
    <main id="formContainer">
        <section>
            <h1>Login</h1>
            <hr>
            @if(session()->has('login-error'))
                <small style="color: red; margin-bottom: 12px;">{{ session('login-error') }}</small>
            @endif
            <section>
                <form action="{{ route('post.login') }}" method="POST" autocomplete="off">
                    @csrf
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="uk-input" value="{{ old('username') }}" autofocus required>
                    <br>
                    <br>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="uk-input" required>
                    <br>
                    <br>
                    <button type="submit" class="uk-button uk-button-primary">Login</button>
                    <hr>
                    <a href="{{ route('get.registration') }}">Registration</a>
                </form>
            </section>
        </section>
    </main>
@endsection
