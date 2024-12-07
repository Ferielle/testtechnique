<head>
    <!-- Autres balises -->
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
</head>

<div class="article-details">
    <h1>{{ $article->title }}</h1>
    <p><strong>Description :</strong> {{ $article->description }}</p>
    <p><strong>Thème :</strong> {{ $article->theme->label }}</p>
    <p><strong>Date :</strong> {{ $article->date }}</p>

    @if($article->image)
        <div class="article-image">
            <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article" width="300">
        </div>
    @else
        <p>Aucune image disponible</p>
    @endif
    <a href="{{ route('articles.home') }}" class="btn-home">Retour à l'accueil</a>

</div>


