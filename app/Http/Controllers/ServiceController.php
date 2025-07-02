<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::with('partenaire')->orderBy('created_at', 'desc')->paginate(10);
        return view('service.index', compact('services'));
    }
    public function create()
    {
        $partenaires = Partenaire::all();
        return view('service.create', compact('partenaires'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'partenaire_id' => 'required'
        ]);

        Service::create($request->all());

        return redirect()->route('service.index')->with('success', 'Service enregistrée avec succès.');
    }

    public function edit(Service $service)
    {
        $partenaires = Partenaire::all();
        return view('service.edit', compact('service', 'partenaires'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nom' => 'required|max:255|unique:services,nom,' . $service->id,
            'description' => 'nullable|string',
            'partenaire_id' => 'required|exists:partenaires,id'
        ]);

        $service->update($request->all());

        return redirect()->route('service.index')->with('success', 'Partenaire mise à jour.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service supprimé.');
    }

}
