<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;


class ThemeController extends Controller
{

    protected $title = 'Theme';

    public function index()
    {
        $themes = Theme::all();
        return view('themes.index', compact('themes'));
    }
    public function create()
    {
        return view('themes.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'label' => 'required|string|max:255',
        'slug' => 'required|string|unique:themes,slug|max:255',
    ]);

    Theme::create($request->all());

    return redirect()->route('themes.index')->with('success', 'Thème ajouté avec succès.');
}


public function edit($id)
{
    $theme = Theme::findOrFail($id);
    return view('themes.edit', compact('theme'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'label' => 'required|string|max:255',
        'slug' => 'required|string|unique:themes,slug,' . $id . '|max:255',
    ]);

    $theme = Theme::findOrFail($id);
    $theme->update($request->all());

    return redirect()->route('themes.index')->with('success', 'Thème mis à jour avec succès.');
}

public function destroy($id)
{
    $theme = Theme::findOrFail($id);
    $theme->delete();

    return redirect()->route('themes.index')->with('success', 'Thème supprimé avec succès.');
}

}
