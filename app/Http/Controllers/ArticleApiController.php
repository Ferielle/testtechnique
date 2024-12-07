<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Theme;
class ArticleApiController extends Controller
{

    // Récupérer tous les articles
    public function index()
    {
        return response()->json(Article::all());
    }

    // Récupérer un article spécifique
    public function show($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article non trouvé'], 404);
        }
        return response()->json($article);
    }

    // Créer un nouvel article
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable',
            'idTheme' => 'required|integer',
            'date' => 'required|date'
        ]);

        $article = Article::create($validated);
        return response()->json($article, 201);
    }

    // Mettre à jour un article
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article non trouvé'], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable',
            'idTheme' => 'required|integer',
            'date' => 'required|date'
        ]);

        $article->update($validated);
        return response()->json($article);
    }

    // Supprimer un article
    public function destroy($id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'Article non trouvé'], 404);
        }

        $article->delete();
        return response()->json(['message' => 'Article supprimé']);
    }
}
