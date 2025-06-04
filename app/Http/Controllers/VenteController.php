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
            'quantite' => 'required|integer|min:1',
            'prix_nego' => 'nullable|numeric|min:0', // Ajout du champ prix_nego
        ]);

        $produit = Produit::findOrFail($request->produit_id);

        if ($produit->vendre($request->quantite)) {
            // Utilisation du prix négocié s'il est renseigné, sinon on prend le prix normal
            $prix_total = $request->prix_nego ? $request->prix_nego * $request->quantite : $produit->prix * $request->quantite;

            Vente::create([
                'produit_id' => $produit->id,
                'quantite' => $request->quantite,
                'prix_nego' => $request->prix_nego, // Enregistrement du prix négocié
                'prix_total' => $prix_total
            ]);

            // Vérification après la vente
            $produit->verifierStock();

            return redirect()->route('produits.index')->with('success', 'Vente enregistrée avec succès.');
        }

        return redirect()->route('produits.index')->with('error', 'Stock insuffisant pour cette vente.');
    }
}
