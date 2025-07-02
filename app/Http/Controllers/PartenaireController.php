<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    public function index()
    {
        $partenaires = Partenaire::orderBy('created_at', 'Desc')->paginate(5);
        return view('partenaire.index', compact('partenaires'));
    }

    public function create()
    {
        return view('partenaire.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|unique:categories|max:255',
            'description' => 'nullable|string'
        ]);

        Partenaire::create($request->all());

        return redirect()->route('partenaire.index')->with('success_msg', 'Catégorie ajoutée avec succès.');
    }

    public function edit(Partenaire $partenaire)
    {
        return view('partenaire.edit', compact('partenaire'));
    }

    public function update(Request $request, Partenaire $partenaire)
    {
        $request->validate([
            'nom' => 'required|max:255|unique:partenaires,nom,' . $partenaire->id,
            'description' => 'nullable|string'
        ]);

        $partenaire->update($request->all());

        return redirect()->route('partenaire.index')->with('success_msg', 'Partenaire mise à jour.');
    }

    public function destroy(Partenaire $partenaire)
    {
        $partenaire->delete();
        return redirect()->route('partenaire.index')->with('success_msg', 'Partenaire supprimé.');
    }
}
