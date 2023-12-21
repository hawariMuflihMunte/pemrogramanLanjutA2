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
            <h1>Registration</h1>
            <hr>
            @if(session()->has('registration-error'))
                <small style="color: red; margin-bottom: 12px;">{{ session('registration-error') }}</small>
            @endif
            <section>
                <form action="{{ route('post.registration') }}" method="POST" autocomplete="off">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="uk-input" value="{{ old('name') }}" autofocus required>
                    <br>
                    <br>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="uk-input" value="{{ old('username') }}" required>
                    <br>
                    <br>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="uk-input" value="{{ old('email') }}" required>
                    <br>
                    <br>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="uk-input" required>
                    <br>
                    <br>
                    <button type="submit" class="uk-button uk-button-primary">Register</button>
                    <hr>
                    <a href="{{ route('login') }}">Login</a>
                </form>
            </section>
        </section>
    </main>
@endsection
