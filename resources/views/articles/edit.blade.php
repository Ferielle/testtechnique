<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-white">
                <h3 class="mb-0">Modifier l'Article</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titre :</label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ $article->title }}"
                            placeholder="Entrez le titre de l'article"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea
                            class="form-control"
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Écrivez une description"
                            required>{{ $article->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image :</label>
                        <input
                            type="file"
                            class="form-control"
                            id="image"
                            name="image">
                        <small class="text-muted">Laissez vide si vous ne souhaitez pas modifier l'image.</small>
                    </div>

                    <div class="mb-3">
                        <label for="idTheme" class="form-label">Thème :</label>
                        <select class="form-select" id="idTheme" name="idTheme" required>
                            @foreach ($themes as $theme)
                                <option
                                    value="{{ $theme->id }}"
                                    @if($theme->id == $article->idTheme) selected @endif>
                                    {{ $theme->label }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date :</label>
                        <input
                            type="date"
                            class="form-control"
                            id="date"
                            name="date"
                            value="{{ $article->date }}"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
    <a href="{{ route('articles.home') }}" class="btn-home">Retour à l'accueil</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
