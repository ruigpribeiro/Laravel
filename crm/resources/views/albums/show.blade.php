@extends('layouts.app')

@section('title', 'Álbum - ' . $album->name)

@section('content')
    <h1>Álbum - {{ $album->name }}</h1>

    <p>Data de Lançamento: {{ $album->release_date }}</p>
    <img src="{{ $album->image ? asset('storage/' . $album->image) : asset('storage/images/default-album.jpg') }}" class="img-fluid img-thumbnail" alt="{{ $album->name }}" width="100">

    <form action="{{ route('albums.destroy', [$album->band_id, $album->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Apagar Álbum</button>
    </form>
@endsection
