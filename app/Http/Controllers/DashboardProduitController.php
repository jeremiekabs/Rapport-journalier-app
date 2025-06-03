<?php

namespace App\Http\Controllers;

use App\Models\Alerts_stock;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardProduitController extends Controller
{
    public function index()
    {
        $ventes = Vente::with('produit')->paginate(10);
        $alertes = Alerts_stock::where('is_alert', true)->paginate(2);

        // Produits les plus vendus
        $produitsVendus = Vente::select('produit_id', DB::raw('SUM(quantite) as total_vendu'))
            ->groupBy('produit_id')
            ->orderBy('total_vendu', 'desc')
            ->orderBy(DB::raw('(SELECT nom FROM produits WHERE id = ventes.produit_id)'), 'asc')
            ->take(3)
            ->get();

        // Produits ayant généré le plus d'argent
        $produitsPlusRentables = Vente::select('produit_id', DB::raw('SUM(prix_total) as total_revenu'))
            ->groupBy('produit_id')
            ->orderBy('total_revenu', 'desc')
            ->take(2)
            ->get();

        return view('dashboard.index', compact('ventes', 'alertes', 'produitsVendus', 'produitsPlusRentables'));
    }
}
