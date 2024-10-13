@extends('layouts.app')

@section('title', 'Editar Banda - ' . $band->name)

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Editar Banda - {{ $band->name }}</h1>
    
    <form action="{{ route('bands.update', $band->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')

        <!-- Nome da Banda -->
        <div class="col-md-6">
            <label for="name" class="form-label fw-bold">Nome da Banda</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name', $band->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Foto da Banda -->
        <div class="col-md-6">
            <label for="photo" class="form-label fw-bold">Foto Atual</label>
            <div class="mb-2">
                <img src="{{ $band->photo ? asset('storage/' . $band->photo) : asset('images/default-band.jpg') }}" 
                     class="img-thumbnail" width="150">
            </div>
            <label for="photo" class="form-label fw-bold">Nova Foto da Banda</label>
            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary w-100">Atualizar Banda</button>
        </div>
    </form>
</div>
@endsection
