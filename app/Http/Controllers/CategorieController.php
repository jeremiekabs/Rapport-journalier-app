<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::orderBy('created_at', 'Desc')->get();
        return view('categorie.index', compact('categories'));
    }

    public function create()
    {
        return view('categorie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:categories|max:255',
            'description' => 'nullable|string'
        ]);

        Categorie::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function edit(Categorie $categorie)
    {
        return view('categorie.edit', compact('categorie'));
    }

    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'nom' => 'required|max:255|unique:categories,nom,' . $categorie->id,
            'description' => 'nullable|string'
        ]);

        $categorie->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour.');
    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée.');
    }
}
