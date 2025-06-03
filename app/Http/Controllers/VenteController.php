<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function create()
    {
        $produits = Produit::all();
        return view('vendre.vendre', compact('produits'));
    }

    public function vendre(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1'
        ]);

        $produit = Produit::findOrFail($request->produit_id);

        if ($produit->vendre($request->quantite)) {
            Vente::create([
                'produit_id' => $produit->id,
                'quantite' => $request->quantite,
                'prix_total' => $produit->prix * $request->quantite
            ]);

            // Vérification après la vente
            $produit->verifierStock();

            return redirect()->route('produits.index')->with('success', 'Vente enregistrée avec succès.');
        }

        return redirect()->route('produits.index')->with('error', 'Stock insuffisant pour cette vente.');
    }
}
