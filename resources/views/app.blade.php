<header>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</header>
@section('title', 'Top 20 Articles of 2023')

@section('content')
<div class="wrapper">
    <h1 class="main-title">Top 20 articles of 2023</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary">Ajouter un article</a>

    <div class="articles-container">
        @foreach ($articles as $article)
        <div class="card">
            <!-- Image -->
            <div class="card-image">
                @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article">
                @else
                <div class="placeholder">Aucune image</div>
                @endif
            </div>

            <!-- Body -->
            <div class="card-body">
                <h2>{{ $article->title }}</h2>
                <p>{{ $article->description }}</p>
                <span class="published">Publié le {{ $article->date }}</span>
            </div>

            <!-- Actions -->
            <div class="card-actions">
                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-link">Voir les détails</a>
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-success">Modifier</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
