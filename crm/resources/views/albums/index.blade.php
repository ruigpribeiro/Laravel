@extends('layouts.app')

@section('title', 'Álbuns de ' . $band->name)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Álbuns de {{ $band->name }}</h1>
        <a href="{{ route('albums.create', $band->id) }}" class="btn btn-primary">Adicionar Álbum</a>
    </div>

    <div class="row">
        @foreach ($band->albums as $album)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ $album->image ? asset('storage/' . $album->image) : asset('images/audi_r8.jpg') }}" class="card-img-top" alt="{{ $album->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <p class="card-text">Data de Lançamento: {{ $album->release_date }}</p>
                        <a href="{{ route('albums.show', [$band->id, $album->id]) }}" class="btn btn-info">Ver Detalhes</a>
                        <a href="{{ route('albums.edit', [$band->id, $album->id]) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('albums.destroy', [$band->id, $album->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
