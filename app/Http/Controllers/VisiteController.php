<?php

namespace App\Http\Controllers;

use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VisiteController extends Controller
{
    public function index()
    {
        $visites = Visite::with('user')->orderBy('created_at', 'desc')->paginate(15);
        return view('visite.index', compact('visites'));
    }

    public function create()
    {
        $enumValues = Visite::getEnumValues();
        return view('visite.create', compact('enumValues'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'heure_entree' => 'required',
                'heure_sortie' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                'qualite_personne' => 'required',
                'entreprise' => 'nullable',
                'particulier' => 'nullable',
                'telephone' => 'required',
                'email' => 'nullable',
                'raison_visite' => 'nullable',
                'produit_service_demande' => 'nullable',
                'vente_directe' => 'required',
                'visite_site' => 'required',
                'vente' => 'required',
                'commentaires' => 'nullable',
                'user_id' => '',
            ]
        );
        $insert = new Visite();

        $insert->date_enr = Carbon::now()->format('Y-m-d');
        $insert->heure_entree = $request->heure_entree;
        $insert->heure_sortie = $request->heure_sortie;
        $insert->nom = $request->nom;
        $insert->prenom = $request->prenom;
        $insert->qualite_personne = $request->qualite_personne;
        $insert->entreprise = $request->entreprise;
        $insert->particulier = $request->particulier;
        $insert->telephone = $request->telephone;
        $insert->email = $request->email;
        $insert->raison_visite = $request->raison_visite;
        $insert->produit_service_demande = $request->produit_service_demande;
        $insert->vente_directe = $request->vente_directe;
        $insert->visite_site = $request->visite_site;
        $insert->vente = $request->vente;
        $insert->commentaires = $request->commentaires;

        $insert->user_id = Auth::id();

        $resultat = $insert->save();

        return redirect()->route('visite.index')->with('success_message', 'Visite enregistrée avec succès.');
    }

    public function edit(Visite $visite)
    {
        $enumValues = Visite::getEnumValues();

        return view('visite.edit', compact('visite', 'enumValues'));
    }

    public function update(Request $request, Visite $visite)
    {
        $request->validate([
            'date_enr' => [],
            'heure_entree' => [],
            'heure_sortie' => [],
            'nom' => [],
            'prenom' => [],
            'qualite_personne' => [],
            'entreprise' => [],
            'particulier' => [],
            'telephone' => [],
            'email' => [],
            'raison_visite' => [],
            'produit_service_demande' => [],
            'vente_directe' => [],
            'visite_site' => [],
            'vente' => [],
            'commentaires' => [],
            'user_id' => [],
        ]);

        $visite->update($request->all());
        return redirect()->route('visite.index')->with('success_message', 'Visite mise à jour avec succès.');
    }
    public function show(Visite $visite)
    {
        return view('visite.show', compact('visite'));
    }

    public function destroy(Visite $visite)
    {
        $visite->delete();
        return redirect()->route('visite.index')->with('success_message', 'Visite supprimée avec succès.');
    }
    public function countTodayVisits()
    {
        $today = Carbon::now()->format('Y-m-d'); 
        $count = Visite::whereDate('date_enr', $today)->count(); 

        return response()->json(['count' => $count]);
    }
}
