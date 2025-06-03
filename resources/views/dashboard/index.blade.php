@extends('layouts.template')
@section('content')
    <canvas id="chartVentes" width="300" height="150"></canvas>

    <div class="card mt-4">
        <div class="card-body">
            <h4 class="fw-bold text-primary">🏆 Produits les Plus Vendus</h4>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Produit</th>
                        <th>Quantité Vendue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produitsVendus as $produit)
                        <tr>
                            <td>{{ App\Models\Produit::find($produit->produit_id)->nom }}</td>
                            <td>{{ $produit->total_vendu }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h4 class="fw-bold text-success">💰 Produits les Plus Rentables</h4>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Produit</th>
                        <th>Revenu Total ($)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produitsPlusRentables as $produit)
                        <tr>
                            <td>{{ App\Models\Produit::find($produit->produit_id)->nom }}</td>
                            <td>{{ number_format($produit->total_revenu, 2) }} $</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h4 class="fw-bold text-danger">🚨 Produits en Rupture de Stock</h4>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Produit</th>
                        <th>Date de Rupture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alertes as $alerte)
                        <tr>
                            <td>{{ $alerte->produit->nom }}</td>
                            <td>{{ $alerte->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                {{ $alertes->links() }}
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="fw-bold text-success">🛒 Liste des Ventes</h4>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix Total</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventes as $vente)
                            <tr>
                                <td>{{ $vente->produit->nom }}</td>
                                <td>{{ $vente->quantite }}</td>
                                <td>{{ number_format($vente->prix_total, 2) }} $</td>
                                <td>{{ $vente->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $ventes->links() }}
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chartVentes').getContext('2d');
        var chartVentes = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($produitsVendus->pluck('produit_id')->map(fn($id) => App\Models\Produit::find($id)->nom)),
                datasets: [{
                    label: 'Quantité Vendue',
                    data: @json($produitsVendus->pluck('total_vendu')),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endsection
