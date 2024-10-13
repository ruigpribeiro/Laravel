@extends('layouts.app')

@section('title', 'Bandas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Bandas</h1>
        @auth
        <a href="{{ route('bands.create') }}" class="btn btn-primary">Adicionar Banda</a>
        @endauth
    </div>

    <div class="row">
        @foreach ($bands as $band)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ $band->photo ? asset('storage/' . $band->photo) : asset('storage/photos/audi_r8.jpg') }}" class="card-img-top" alt="{{ $band->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $band->name }}</h5>
                        <p class="card-text">Álbuns: {{ $band->albums->count() }}</p>
                        <a href="{{ route('bands.albums', $band->id) }}" class="btn btn-info">Ver Álbuns</a>
                        @auth
                        <a href="{{ route('bands.edit', $band->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('bands.destroy', $band->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
