@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required autofocus>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
