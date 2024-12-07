

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
</br>
</br>

<body>
    <div class="wrapper">
        <h1>Top 20 articles of 2023</h1>
        </br>
</br>
<!-- Bouton bleu qui se transforme en vert au clic -->
<a href="{{ route('articles.create') }}" class="custom-btn">
    <i class="bi bi-plus-circle"></i> Ajouter un article
</a>

</div>
    </br>
    </br>
    <main>


  <div class="articles-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
    @foreach ($articles as $article)
    <div class="card" style="width: 300px; border: 1px solid #ddd; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <!-- Image -->
        <div class="card-image" style="height: 200px; overflow: hidden;">
            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article" style="width: 100%; height: 100%; object-fit: cover;">
            @else
                <div style="display: flex; align-items: center; justify-content: center; height: 100%; background-color: #f5f5f5; color: #aaa;">
                    <span>Aucune image</span>
                </div>
            @endif
        </div>
        <!-- Contenu -->
        <div class="card-content" style="padding: 15px;">
            <h3 style="margin: 0 0 10px; font-size: 18px; color: #333;">{{ $article->title }}</h3>
            <p style="margin: 0 0 10px; font-size: 14px; color: #666;">{{ $article->description }}</p>
            <p style="margin: 0 0 5px; font-size: 14px; color: #999;"><strong>Thème :</strong> {{ $article->theme->label }}</p>
            <p style="margin: 0 0 10px; font-size: 14px; color: #999;"><strong>Date :</strong> {{ $article->date }}</p>
        </div>
        <!-- Actions -->
        <div class="card-actions" style="padding: 15px; border-top: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('articles.show', $article->id) }}" style="font-size: 14px; color: #007bff; text-decoration: none;">Voir les détails</a>
            <div>
                <a href="{{ route('articles.edit', $article->id) }}" style="font-size: 14px; color: #28a745; text-decoration: none; margin-right: 10px;">Modifier</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')" style="font-size: 14px; color: #dc3545; background: none; border: none; cursor: pointer;">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

    </main>

    <footer>
        <!-- Footer content -->
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
