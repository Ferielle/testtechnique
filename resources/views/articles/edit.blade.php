@extends('app')

@section('content')
    <h1>Modifier l'Article</h1>
    <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" value="{{ $article->title }}" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required>{{ $article->description }}</textarea>

        <label for="image">Image :</label>
        <input type="file" id="image" name="image">

        <label for="idTheme">Thème :</label>
        <select id="idTheme" name="idTheme" required>
            @foreach ($themes as $theme)
                <option value="{{ $theme->id }}" @if($theme->id == $article->idTheme) selected @endif>
                    {{ $theme->label }}
                </option>
            @endforeach
        </select>

        <label for="date">Date :</label>
        <input type="date" id="date" name="date" value="{{ $article->date }}" required>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
