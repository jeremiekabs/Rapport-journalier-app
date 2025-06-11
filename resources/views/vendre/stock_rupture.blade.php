@extends('layouts.template')

@section('content')
<div class="container">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="fw-bold">🛒 Alertes de Stock</h4>
            <button class="btn btn-light btn-sm"><i class="fas fa-sync-alt"></i> Rafraîchir</button>
        </div>

        <div class="card-body">
            <form method="GET" action="{{ route('stock.alerte') }}" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <select name="produit_id" class="form-select">
                            <option value="">-- Sélectionner un produit --</option>
                            @foreach ($produits as $id => $nom)
                                <option value="{{ $id }}" {{ request('produit_id') == $id ? 'selected' : '' }}>
                                    {{ $nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-filter"></i> Filtrer
                        </button>
                    </div>
                </div>
            </form>

            <table class="table table-hover table-striped border">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>Nom du produit</th>
                        <th>Date d'alerte</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alertes as $alerte)
                        <tr>
                            <td><i class="fas fa-box"></i> {{ $alerte->produit->nom }}</td>
                            <td><i class="far fa-calendar-alt"></i> {{ $alerte->created_at->format('d/m/Y') }}</td>
                            <td><small class="text-muted">{{ $alerte->created_at->diffForHumans() }}</small></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $alertes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
