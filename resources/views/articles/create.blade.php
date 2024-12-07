@extends('app')

@section('content')
    <h1>Ajouter un Article</h1>
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description :</label>
        <textarea id="description" name="description" required></textarea>

        <label for="image">Image :</label>
        <input type="file" id="image" name="image" required>

        <label for="idTheme">Thème :</label>
        <select id="idTheme" name="idTheme" required>
            @foreach ($themes as $theme)
                <option value="{{ $theme->id }}">{{ $theme->label }}</option>
            @endforeach
        </select>

        <label for="date">Date :</label>
        <input type="date" id="date" name="date" required>

        <button type="submit">Enregistrer</button>
    </form>
@endsection
