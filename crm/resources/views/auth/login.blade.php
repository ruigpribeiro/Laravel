@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Login</h1>
    
    <form method="POST" action="{{ route('login') }}" class="row g-3">
        @csrf

        <!-- Email Address -->
        <div class="col-12">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="col-12">
            <label for="password" class="form-label fw-bold">Password</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                   required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>
    </form>
</div>
@endsection
