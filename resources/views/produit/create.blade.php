@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center">➕ Ajouter un Produit</h2>

    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('produits.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Nom du produit :</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Description :</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Prix d'achat :</label>
                    <input type="number" name="prix_achat" class="form-control" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Indice :</label>
                    <input type="number" name="indice" class="form-control" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Stock :</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Catégorie :</label>
                    <select name="categorie_id" class="form-select">
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">🚀 Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection
