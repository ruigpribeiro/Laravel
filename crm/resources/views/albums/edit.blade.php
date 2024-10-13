@extends('layouts.app')

@section('title', 'Editar Álbum - ' . $album->name)

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Editar Álbum - {{ $album->name }}</h1>
    
    <form action="{{ route('albums.update', [$album->band_id, $album->id]) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')

        <!-- Nome do Álbum -->
        <div class="col-md-6">
            <label for="name" class="form-label fw-bold">Nome do Álbum</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name', $album->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Data de Lançamento -->
        <div class="col-md-6">
            <label for="release_date" class="form-label fw-bold">Data de Lançamento</label>
            <input type="date" name="release_date" id="release_date" class="form-control @error('release_date') is-invalid @enderror"
                   value="{{ old('release_date', $album->release_date) }}" required>
            @error('release_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Capa do Álbum -->
        <div class="col-md-6">
            <label for="image" class="form-label fw-bold">Capa Atual</label>
            <div class="mb-2">
                <img src="{{ $album->image ? asset('storage/' . $album->image) : asset('images/default-album.jpg') }}" 
                     class="img-thumbnail" width="150">
            </div>
            <label for="image" class="form-label fw-bold">Nova Capa do Álbum</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary w-100">Atualizar Álbum</button>
        </div>
    </form>
</div>
@endsection
