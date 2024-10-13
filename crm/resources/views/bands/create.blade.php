@extends('layouts.app')

@section('title', 'Criar Banda')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Criar Banda</h1>
    
    <form action="{{ route('bands.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <!-- Nome da Banda -->
        <div class="col-md-6">
            <label for="name" class="form-label fw-bold">Nome da Banda</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" placeholder="Digite o nome da banda" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Foto da Banda -->
        <div class="col-md-6">
            <label for="photo" class="form-label fw-bold">Foto da Banda</label>
            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success w-100">Criar Banda</button>
        </div>
    </form>
</div>
@endsection
