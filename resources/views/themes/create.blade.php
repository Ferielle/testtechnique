@extends('app')

@section('content')
<h1>Ajouter un Thème</h1>
<form method="POST" action="{{ route('themes.store') }}">
    @csrf
    <label for="label">Libellé :</label>
    <input type="text" id="label" name="label" required>
    <label for="slug">Slug :</label>
    <input type="text" id="slug" name="slug" required>
    <button type="submit">Enregistrer</button>
</form>
@endsection
