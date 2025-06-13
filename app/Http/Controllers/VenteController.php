<?php

namespace App\Http\Controllers;

use App\Models\Alerts_stock;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function index()
    {
        $ventes = Vente::with('produit')->orderBy('created_at', 'desc')->paginate(10);
        return view('vendre.index', compact('ventes'));
    }
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

            $vente = Vente::create([
                'produit_id' => $produit->id,
                'quantite' => $request->quantite,
                'prix_nego' => $request->prix_nego, // Enregistrement du prix négocié
                'prix_total' => $prix_total
            ]);

            // Vérification après la vente
            $produit->verifierStock();

            return redirect()->route('vente.facture', ['id' => $vente->id])->with('success', 'Vente enregistrée avec succès.');
        }

        return redirect()->route('vente.index')->with('error', 'Stock insuffisant pour cette vente.');
    }

    public function facture($id)
    {
        $vente = Vente::with('produit')->findOrFail($id);

        return view('vendre.facture', compact('vente'));
    }


    public function alertes(Request $request)
    {
        $query = Alerts_stock::query()->where('is_alert', true);

        // Récupérer tous les produits pour le filtre
        $produits = Produit::pluck('nom', 'id');

        // Filtrer par nom de produit
        if ($request->filled('produit_id')) {
            $query->where('produit_id', $request->produit_id);
        }

        $alertes = $query->paginate(12);

        return view('vendre.stock_rupture', compact('alertes', 'produits'));
    }
}
