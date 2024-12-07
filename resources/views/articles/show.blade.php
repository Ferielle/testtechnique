@extends('app')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p><strong>Description :</strong> {{ $article->description }}</p>
    <p><strong>Thème :</strong> {{ $article->theme->label }}</p>
    <p><strong>Date :</strong> {{ $article->date }}</p>

    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article" width="300">
    @else
        <p>Aucune image</p>
    @endif

@endsection
