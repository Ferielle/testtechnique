@extends('app')

@section('content')
<h1>Modifier le Thème</h1>
<form method="POST" action="{{ route('themes.update', $theme->id) }}">
    @csrf
    @method('PUT')
    <label for="label">Libellé :</label>
    <input type="text" id="label" name="label" value="{{ $theme->label }}" required>
    <label for="slug">Slug :</label>
    <input type="text" id="slug" name="slug" value="{{ $theme->slug }}" required>
    <button type="submit">Mettre à jour</button>
</form>
@endsection
