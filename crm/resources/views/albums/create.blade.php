@extends('layouts.app')

@section('title', 'Adicionar Álbum a ' . $band->name)

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Adicionar Álbum à Banda - {{ $band->name }}</h1>
    
    <form action="{{ route('albums.store', $band->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <!-- Nome do Álbum -->
        <div class="col-md-6">
            <label for="name" class="form-label fw-bold">Nome do Álbum</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}" placeholder="Digite o nome do álbum" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Data de Lançamento -->
        <div class="col-md-6">
            <label for="release_date" class="form-label fw-bold">Data de Lançamento</label>
            <input type="date" name="release_date" id="release_date" class="form-control @error('release_date') is-invalid @enderror"
                   value="{{ old('release_date') }}" required>
            @error('release_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Capa do Álbum -->
        <div class="col-md-6">
            <label for="image" class="form-label fw-bold">Capa do Álbum</label>
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success w-100">Adicionar Álbum</button>
        </div>
    </form>
</div>
@endsection
