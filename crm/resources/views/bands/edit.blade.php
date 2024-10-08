@extends('layouts.app')

@section('title', 'Editar Banda')

@section('content')
    <h1 class="mb-4">Editar Banda - {{ $band->name }}</h1>

    <form action="{{ route('bands.update', $band->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label for="name" class="form-label">Nome da Banda</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $band->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="photo" class="form-label">Foto Atual</label>
            <div class="mb-2">
                <img src="{{ $band->photo ? asset('storage/' . $band->photo) : asset('images/default-band.jpg') }}" class="img-thumbnail" width="150">
            </div>
            <label for="photo" class="form-label">Nova Foto da Banda</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @error('photo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Atualizar Banda</button>
        </div>
    </form>
@endsection
