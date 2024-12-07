<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ArticleApiController;

use Illuminate\Support\Facades\Route;


//MODIFIED REVERIFY
// Routes pour les API Crud sans interfaces avec controller ArticleApiController
// Route::get('/api/articles', [ArticleApiController::class, 'index']); // Liste des articles
// Route::get('/api/articles/{id}', [ArticleApiController::class, 'show']); // Afficher un article
// Route::post('/api/articles', [ArticleApiController::class, 'store']); // Ajouter un article
// Route::put('/api/articles/{id}', [ArticleApiController::class, 'update']); // Modifier un article
// Route::delete('/api/articles/{id}', [ArticleApiController::class, 'destroy']); // Supprimer un article






// Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

//faire appel au formulaire
Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');

Route::get('/themes/create', [ThemeController::class, 'create'])->name('themes.create');


Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');
Route::post('/themes', [ThemeController::class, 'store'])->name('themes.store');
Route::get('/themes/{id}/edit', [ThemeController::class, 'edit'])->name('themes.edit');
Route::put('/themes/{id}', [ThemeController::class, 'update'])->name('themes.update');
Route::delete('/themes/{id}', [ThemeController::class, 'destroy'])->name('themes.destroy');

Route::get('/', [ArticleController::class, 'home'])->name('articles.home');


