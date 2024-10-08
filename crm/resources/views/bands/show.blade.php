@extends('layouts.app')

@section('title', 'Detalhes da Banda')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $band->photo ? asset('storage/' . $band->photo) : asset('storage/photos/audi_r8.jpg') }}" class="img-fluid img-thumbnail" alt="{{ $band->name }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $band->name }}</h1>
            <p>Álbuns: {{ $band->albums->count() }}</p>
            <a href="{{ route('bands.edit', $band->id) }}" class="btn btn-warning">Editar Banda</a>
        </div>
    </div>
@endsection
