@extends('layouts.app')

@section('title', 'Editar Álbum - ' . $album->name)

@section('content')
    <h1 class="mb-4">Editar Álbum - {{ $album->name }}</h1>

    <form action="{{ route('albums.update', [$album->band_id, $album->id]) }}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label for="name" class="form-label">Nome do Álbum</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $album->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="release_date" class="form-label">Data de Lançamento</label>
            <input type="date" name="release_date" id="release_date" class="form-control" value="{{ old('release_date', $album->release_date) }}" required>
            @error('release_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-6">
            <label for="image" class="form-label">Capa Atual</label>
            <div class="mb-2">
                <img src="{{ $album->image ? asset('storage/' . $album->image) : asset('images/default-album.jpg') }}" class="img-thumbnail" width="150">
            </div>
            <label for="image" class="form-label">Nova Capa do Álbum</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Atualizar Álbum</button>
        </div>
    </form>
@endsection
