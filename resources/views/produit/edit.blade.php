@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center">✏️ Modifier le Produit</h2>

    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('produits.update', $produit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-bold">Nom :</label>
                    <input type="text" name="nom" class="form-control" value="{{ $produit->nom }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Prix :</label>
                    <input type="number" name="prix" class="form-control" step="0.01" value="{{ $produit->prix }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Stock :</label>
                    <input type="number" name="stock" class="form-control" value="{{ $produit->stock }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Catégorie :</label>
                    <select name="categorie_id" class="form-select">
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-warning w-100">✅ Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
