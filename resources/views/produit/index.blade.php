@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold">🛒 Produits</h2>
        <a href="{{ route('produits.create') }}" class="btn btn-primary">➕ Ajouter un produit</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="card mt-3">
        <div class="card-body">
            @if($produits->count() > 0)
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produits as $produit)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $produit->nom }}</td>
                                <td>{{ $produit->categorie->nom }}</td>
                                <td>{{ number_format($produit->prix, 2) }} $</td>
                                <td>{{ $produit->stock }}</td>
                                <td>
                                    <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-warning btn-sm">✏️ Modifier</a>
                                    <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">🗑️ Supprimer</button>
                                    </form>
                                    <a href="{{ route('produit.edit', $produit->id) }}" >👁️‍🗨️ Détails</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-muted">❌ Aucun produit enregistré.</p>
            @endif
        </div>
    </div>
</div>
@endsection
