<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visite;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Visite::query();
        $filtresActifs = [];

        if ($request->filled('date_enr')) {
            $query->whereDate('date_enr', $request->date_enr);
            $filtresActifs['Date'] = $request->date_enr;
        }
        if ($request->filled('vente_directe')) {
            $query->where('vente_directe', $request->vente_directe);
            $filtresActifs['Vente Directe'] = $request->vente_directe;
        }
        if ($request->filled('visite_site')) {
            $query->where('visite_site', $request->visite_site);
            $filtresActifs['Visite Site'] = $request->visite_site;
        }
        if ($request->filled('vente')) {
            $query->where('vente', $request->vente);
            $filtresActifs['Vente'] = $request->vente;
        }

        $nombreResultats = $query->count(); // Compter le nombre total des visites filtrées
        $visites = $query->orderBy('created_at', 'desc')->paginate(5);
        $visitesToday = Visite::whereDate('date_enr', Carbon::now()->format('Y-m-d'))->count();
        $totalVisites = Visite::count();

        return view('dashboard', compact('visites', 'visitesToday', 'totalVisites', 'filtresActifs', 'nombreResultats'));
    }

    // Compter les visites du jour
    public function countTodayVisits()
    {
        $today = Carbon::now()->format('Y-m-d');
        $count = Visite::whereDate('date_enr', $today)->count();

        return response()->json(['count' => $count]);
    }

    // Compter toutes les visites enregistrées
    public function countTotalVisits()
    {
        $count = Visite::count();

        return response()->json(['count' => $count]);
    }

    public function getVisiteStats()
    {
        return response()->json([
            'jour' => Visite::whereDate('date_enr', Carbon::now()->format('Y-m-d'))->count(),
            'semaine' => Visite::whereDate('date_enr', '>=', Carbon::now()->subWeek())->count(),
            'mois' => Visite::whereDate('date_enr', '>=', Carbon::now()->subMonth())->count(),
            'annee' => Visite::whereDate('date_enr', '>=', Carbon::now()->subYear())->count(),
        ]);
    }
}
