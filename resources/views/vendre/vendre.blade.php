@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center">🛒 Effectuer une Vente</h2>

    <div class="card mt-3">
        <div class="card-body">
            @if(session('alerte_stock'))
                <div class="alert alert-danger">{{ session('alerte_stock') }}</div>
            @endif

            <form action="{{ route('vente.vendre') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Produit :</label>
                    <select name="produit_id" class="form-select">
                        @foreach($produits as $produit)
                            <option value="{{ $produit->id }}">{{ $produit->nom }} (Stock : {{ $produit->stock }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Quantité :</label>
                    <input type="number" name="quantite" class="form-control" min="1" required>
                </div>
                <button type="submit" class="btn btn-success w-100">✅ Vendre</button>
            </form>
        </div>
    </div>
</div>
@endsection
