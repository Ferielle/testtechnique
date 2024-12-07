<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Theme;

class ArticleController extends Controller
{
    // Afficher la liste des articles
    // public function index()
    // {
    //     $articles = Article::with('theme')->get();
    //     return view('articles.home', compact('articles'));
    // }

    public function home()
    {
        $articles = Article::with('theme')->get();
        return view('articles.home', compact('articles'));
    }

    // Afficher le formulaire de création d'un nouvel article
    public function create()
    {
        $themes = Theme::all();
        return view('articles.create', compact('themes'));
    }

    // Enregistrer un nouvel article
    public function store(Request $request)
    {
        // Validation des données envoyées par le formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image',
            'idTheme' => 'required|exists:themes,id',
            'date' => 'required|date',
        ]);

        // Stockage de l'image
        $imagePath = $request->file('image')->store('images', 'public');

        // Création de l'article
        Article::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'idTheme' => $request->idTheme,
            'date' => $request->date,
        ]);

        // Redirection vers la liste des articles avec un message de succès
        return redirect()->route('articles.home')->with('success', 'Article ajouté avec succès.');
    }

    // Afficher le formulaire d'édition d'un article
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $themes = Theme::all();
        return view('articles.edit', compact('article', 'themes'));
    }

    // Mettre à jour un article
    public function update(Request $request, $id)
    {
        // Validation des données envoyées par le formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'image',  // Image est optionnelle dans la mise à jour
            'idTheme' => 'required|exists:themes,id',
            'date' => 'required|date',
        ]);

        $article = Article::findOrFail($id);

        // Si une nouvelle image est envoyée, on la remplace
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $article->image = $imagePath;
        }

        // Mise à jour de l'article
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'idTheme' => $request->idTheme,
            'date' => $request->date,
        ]);

        // Redirection vers la liste des articles avec un message de succès
        return redirect()->route('articles.home')->with('success', 'Article mis à jour avec succès.');
    }

    // Supprimer un article
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        // Redirection vers la liste des articles avec un message de succès
        return redirect()->route('articles.home')->with('success', 'Article supprimé avec succès.');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id); // Récupère l'article par son ID
        return view('articles.show', compact('article')); // Passe l'article à la vue
    }
}
