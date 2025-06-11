@extends('layouts.template')

@section('content')
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="fw-bold text-success">🛒 Liste des Ventes</h4>

            <!-- Barre de recherche -->
            <div class="mb-3">
                <input type="text" id="search" class="form-control" placeholder="🔍 Rechercher une vente..."
                    onkeyup="filterTable()">
            </div>

            <div class="table-responsive">
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
                                <td>
                                    {{ $vente->created_at->format('d/m/Y H:i') }} <br>
                                    <small class="text-muted">{{ $vente->created_at->diffForHumans() }}</small>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $ventes->links() }}
            </div>
        </div>
    </div>

    <!-- Script pour filtrer les ventes -->
    <script>
        function filterTable() {
            let input = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
    </script>
@endsection
