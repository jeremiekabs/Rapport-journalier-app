@extends('layouts.template')

@section('content')
    <div class="container-fluid mt-4">
        <h2 class="mb-4 text-center">📊 Tableau de Bord - Gestion des Visites</h2>

        <div class="row g-4 d-flex justify-content-center">
            <!-- Statistiques clés -->
            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="mb-3">Visites Aujourd'hui</h6>
                        <h4 class="mb-2" id="visitesToday">{{ $visitesToday }}</h4>
                        <p class="text-success mb-3">📅 {{ now()->format('d/m/Y') }}</p>
                        <div class="badge bg-label-primary rounded-pill">Mises à jour en temps réel</div>
                    </div>
                    <div class="position-relative text-center">
                        <i class="ri-calendar-line icon-48px text-primary"></i>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="mb-3">Total Visites</h6>
                        <h4 class="mb-2" id="totalVisites">{{ $totalVisites }}</h4>
                        <p class="text-info mb-3">Depuis le lancement</p>
                        <div class="badge bg-label-secondary rounded-pill">Toutes les visites enregistrées</div>
                    </div>
                    <div class="position-relative text-center">
                        <i class="ri-group-line icon-48px text-info"></i>
                    </div>
                </div>
            </div>

            <!-- Graphique des visites -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="m-0">Statistiques des Visites</h5>
                        <div class="dropdown">
                            <button class="btn text-body-secondary p-0" type="button" id="statsDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-line icon-24px"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Dernière Semaine</a></li>
                                <li><a class="dropdown-item" href="#">Dernier Mois</a></li>
                                <li><a class="dropdown-item" href="#">Année</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="visitesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulaire de filtrage -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="m-0">🔍 Filtrer les Visites</h5>
            </div>
            <div class="card-body">
                <form method="GET" id="filterForm" class="row g-3">
                    <div class="col-md-3">
                        <input type="date" name="date_enr" class="form-control" placeholder="📅 Date">
                    </div>
                    <div class="col-md-3">
                        <select name="vente_directe" class="form-select">
                            <option value="">Vente Directe</option>
                            <option value="NA">NA</option>
                            <option value="OUI">OUI</option>
                            <option value="NON">NON</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="visite_site" class="form-select">
                            <option value="">Visite Site</option>
                            <option value="NA">NA</option>
                            <option value="OUI">OUI</option>
                            <option value="NON">NON</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="vente" class="form-select">
                            <option value="">Vente</option>
                            <option value="NA">NA</option>
                            <option value="OUI">OUI</option>
                            <option value="NON">NON</option>
                        </select>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Appliquer les filtres</button>
                    </div>
                </form>
                <!-- Résultats après filtrage -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="m-0">📋 Résultats des Visites Filtrées</h5>
                    </div>
                    @if (!empty($filtresActifs))
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="alert alert-info d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>📌 Filtres appliqués :</h5>
                                    <ul>
                                        @foreach ($filtresActifs as $nomFiltre => $valeur)
                                            <li><strong>{{ $nomFiltre }} :</strong> {{ $valeur }}</li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary">Réinitialiser les
                                        filtres</a>
                                </div>

                                <!-- Nombre trouvé affiché sur la même ligne, bien à droite -->
                                <p class="text-primary mt-2"> {{ $nombreResultats }} visite(s) trouvée(s) après filtrage
                                </p>
                            </div>

                        </div>
                    @endif

                    <div class="card-body">
                        @if ($visites->count() > 0)
                            <!-- Ajout de la classe table-responsive pour la responsivité -->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Nom</th>
                                            <th>Entreprise</th>
                                            <th>Raison</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visites as $visite)
                                            <tr>
                                                <td>{{ $visite->date_enr }}</td>
                                                <td>{{ $visite->nom }} {{ $visite->prenom }}</td>
                                                <td>{{ $visite->entreprise ?? 'Particulier' }}</td>
                                                <td>{{ Str::limit($visite->raison_visite, 30) }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-{{ $visite->statut == 'Terminé' ? 'success' : 'warning' }}">
                                                        {{ $visite->statut }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('visite.show', $visite->id) }}"
                                                        class="text-info mx-2" title="Voir">
                                                        <i class="ri-eye-line ri-lg"></i>
                                                    </a>
                                                    <a href="{{ route('visite.edit', $visite->id) }}"
                                                        class="text-warning mx-2" title="Modifier">
                                                        <i class="ri-edit-line ri-lg"></i>
                                                    </a>
                                                    <form action="{{ route('visite.destroy', $visite->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette visite ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="border-0 bg-transparent text-danger mx-2"
                                                            title="Supprimer">
                                                            <i class="ri-delete-bin-line ri-lg"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination centrée -->
                            <div class="d-flex justify-content-center mt-3">
                                {{ $visites->appends(request()->query())->links() }}
                            </div>
                        @else
                            <p class="text-center text-danger">🚨 Aucun résultat trouvé selon les critères sélectionnés !
                            </p>
                        @endif
                    </div>

                </div>

                <div class="card mt-4" id="resultatsFiltrage">
                </div>
            </div>

        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Récupération des statistiques de visites
                Promise.all([
                        fetch("{{ route('count.today.visits') }}").then(response => response.json()),
                        fetch("{{ route('count.total.visits') }}").then(response => response.json()),
                        fetch("{{ route('get.visite.stats') }}").then(response => response.json())
                    ])
                    .then(([todayData, totalData, statsData]) => {
                        // Mise à jour des chiffres
                        document.getElementById("visitesToday").innerText = todayData.count;
                        document.getElementById("totalVisites").innerText = totalData.count;

                        // Intégration du graphique avec les données actualisées
                        var ctx = document.getElementById("visitesChart").getContext("2d");
                        new Chart(ctx, {
                            type: "bar",
                            data: {
                                labels: ["Aujourd'hui", "Dernière Semaine", "Dernier Mois", "Année"],
                                datasets: [{
                                    label: "Visites",
                                    data: [todayData.count, statsData.semaine, statsData.mois,
                                        statsData.annee
                                    ],
                                    backgroundColor: ["#dc3545", "#007bff", "#28a745", "#ffc107"],
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false
                            }
                        });
                    })
                    .catch(error => console.error("Erreur lors du chargement des statistiques :", error));
            });

            document.addEventListener("DOMContentLoaded", function() {
                // Vérifie si des filtres sont appliqués
                if (window.location.search.includes("date_enr") ||
                    window.location.search.includes("vente_directe") ||
                    window.location.search.includes("visite_site") ||
                    window.location.search.includes("vente")) {

                    // Scroll automatique vers la section des résultats
                    setTimeout(() => {
                        document.getElementById("resultatsFiltrage").scrollIntoView({
                            behavior: "smooth"
                        });
                    }, 500); // Petite pause pour bien charger la page
                }
            });

            document.addEventListener("DOMContentLoaded", function() {
                const params = new URLSearchParams(window.location.search);
                params.forEach((value, key) => {
                    const input = document.querySelector(`[name="${key}"]`);
                    if (input) input.value = value;
                });
            });
        </script>

    @endsection
