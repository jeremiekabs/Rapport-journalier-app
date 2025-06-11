<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with('categorie')->orderBy('created_at', 'Desc')->get();
        return view('produit.index', compact('produits'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('produit.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:produits|max:255',
            'description' => 'nullable|string',
            'prix_achat' => 'required|numeric|min:0',
            'indice' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id'
        ]);

        // Calcul du prix et du gain
        $request->merge([
            'prix' => $request->prix_achat * $request->indice,
            'gain' => ($request->prix_achat * $request->indice) - $request->prix_achat,
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }


    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view('produit.edit', compact('produit', 'categories'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|max:255|unique:produits,nom,' . $produit->id,
            'description' => 'nullable|string',
            'prix_achat' => 'required|numeric|min:0',
            'indice' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id'
        ]);

        // Recalcul du prix et du gain en fonction des nouvelles valeurs
        $request->merge([
            'prix' => $request->prix_achat * $request->indice,
            'gain' => ($request->prix_achat * $request->indice) - $request->prix_achat,
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }


    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé.');
    }
    public function show(Produit $produit)
    {
        return view('produit.show', compact('produit'));
    }
}
