<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with('categorie')->orderBy('created_at', 'Desc')->paginate(6);
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
            'categorie_id' => 'required|exists:categories,id',
            'photo' => 'nullable|mimes:png,jpeg,jpg|max:2048',
        ]);

        $filePath = public_path('imagesproduit');

        // Création du dossier s'il n'existe pas
        if (!file_exists($filePath)) {
            mkdir($filePath, 0755, true);
        }

        $data = $request->all();

        // Gestion du téléchargement de l'image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($filePath, $imageName);
            $data['photo'] = 'imagesproduit/' . $imageName;
        }

        // Calcul du prix et du gain
        $data['prix'] = $request->prix_achat * $request->indice;
        $data['gain'] = $data['prix'] - $request->prix_achat;

        Produit::create($data);

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
            'categorie_id' => 'required|exists:categories,id',
            'photo' => 'nullable|mimes:png,jpeg,jpg|max:2048',
        ]);

        $filePath = public_path('imagesproduit');

        // Création du dossier s'il n'existe pas
        if (!file_exists($filePath)) {
            mkdir($filePath, 0755, true);
        }

        $data = $request->all();

        // Si une nouvelle image est uploadée
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne image si elle existe
            if ($produit->photo && file_exists(public_path($produit->photo))) {
                unlink(public_path($produit->photo));
            }

            $image = $request->file('photo');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($filePath, $imageName);
            $data['photo'] = 'imagesproduit/' . $imageName;
        } else {
            // Ne pas écraser l'image si aucune n'est envoyée
            unset($data['photo']);
        }

        // Recalcul du prix et du gain
        $data['prix'] = $request->prix_achat * $request->indice;
        $data['gain'] = $data['prix'] - $request->prix_achat;

        $produit->update($data);

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
    public function produitall()
    {
        $produit_all = Produit::with('categorie')->orderBy('created_at', 'Desc')->paginate(6);

        return view('produit.produitall', compact('produit_all'));
    }
}
