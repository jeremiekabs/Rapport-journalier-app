<?php

namespace App\Http\Controllers;

use App\Models\Alerts_stock;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardProduitController extends Controller
{

    public function index(Request $request)
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

        // Produits les plus rentables
        $produitsPlusRentables = Vente::select('produit_id', DB::raw('SUM(prix_total) as total_revenu'))
            ->groupBy('produit_id')
            ->orderBy('total_revenu', 'desc')
            ->take(2)
            ->get();

        // Récupération de la date choisie ou date du jour
        $dateChoisie = $request->input('date_choisie')
            ? Carbon::parse($request->input('date_choisie'))
            : now();

        // Calcul de la recette du jour choisi
        $recetteJour = Vente::whereDate('created_at', $dateChoisie)->sum('prix_total');

        return view('dashboard.index', compact(
            'ventes',
            'alertes',
            'produitsVendus',
            'produitsPlusRentables',
            'recetteJour',
            'dateChoisie'
        ));
    }
}
