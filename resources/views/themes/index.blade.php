@extends('layouts.app')

@section('content')
<h1>Liste des Thèmes</h1>
<a href="{{ route('themes.create') }}">Ajouter un Thème</a>
<table>
    <thead>
        <tr>
            <th>Libellé</th>
            <th>Slug</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($themes as $theme)
        <tr>
            <td>{{ $theme->label }}</td>
            <td>{{ $theme->slug }}</td>
            <td>
                <a href="{{ route('themes.edit', $theme->id) }}">Modifier</a>
                <form action="{{ route('themes.destroy', $theme->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce thème ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
