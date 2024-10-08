@extends('layouts.app')

@section('title', 'Adicionar Álbum a ' . $band->name)

@section('content')
    <h1 class="mb-4">Adicionar Álbum à Banda - {{ $band->name }}</h1>

    <form action="{{ route('albums.store', $band->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="name" class="form-label">Nome do Álbum</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="release_date" class="form-label">Data de Lançamento</label>
            <input type="date" name="release_date" id="release_date" class="form-control" value="{{ old('release_date') }}" required>
            @error('release_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="image" class="form-label">Capa do Álbum</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success">Adicionar Álbum</button>
        </div>
    </form>
@endsection
