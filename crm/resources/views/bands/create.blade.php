@extends('layouts.app')

@section('title', 'Criar Banda')

@section('content')
    <h1 class="mb-4">Criar Banda</h1>

    <form action="{{ route('bands.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="name" class="form-label">Nome da Banda</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="photo" class="form-label">Foto da Banda</label>
            <input type="file" name="photo" id="photo" class="form-control">
            @error('photo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Criar Banda</button>
        </div>
    </form>
@endsection
