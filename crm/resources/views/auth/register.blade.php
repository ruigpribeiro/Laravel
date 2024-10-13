@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Register</h1>

    <form method="POST" action="{{ route('register') }}" class="row g-3">
        @csrf

        <!-- Name -->
        <div class="col-12">
            <label for="name" class="form-label fw-bold">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="col-12">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" required>
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

        <!-- Confirm Password -->
        <div class="col-12">
            <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <!-- Submit Button -->
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </div>
    </form>
</div>
@endsection
