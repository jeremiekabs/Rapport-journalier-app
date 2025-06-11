@extends('layouts.template')
@section('content')
    <div class="container-fluid mt-4">
        <!-- Header amélioré -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-0 fw-bold">📊 Tableau de Bord - Gestion des Visites</h2>
                <p class="text-muted mb-0">Analytique et gestion des visites en temps réel</p>
            </div>
            <div class="badge bg-primary bg-opacity-10 text-primary p-2 rounded-3">
                <i class="ri-dashboard-line align-middle"></i> Dashboard
            </div>
        </div>

        <div class="row g-4 d-flex justify-content-center">
            <!-- Cartes statistiques améliorées -->
            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-3 text-muted text-uppercase small fw-bold">Visites Aujourd'hui</h6>
                                <h2 class="mb-2 fw-bold" id="visitesToday">{{ $visitesToday }}</h2>
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill">
                                    <i class="ri-calendar-line align-middle"></i> {{ now()->format('d/m/Y') }}
                                </span>
                            </div>
                            <div class="bg-primary bg-opacity-10 p-3 rounded">
                                <i class="ri-calendar-line icon-36px text-primary"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-3 text-muted text-uppercase small fw-bold">Total Visites</h6>
                                <h2 class="mb-2 fw-bold" id="totalVisites">{{ $totalVisites }}</h2>
                                <span class="badge bg-info bg-opacity-10 text-info rounded-pill">
                                    <i class="ri-group-line align-middle"></i> Depuis le lancement
                                </span>
                            </div>
                            <div class="bg-info bg-opacity-10 p-3 rounded">
                                <i class="ri-group-line icon-36px text-info"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Graphique des visites (conservé tel quel) -->
            <div class="col-xl-6">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-3">
                        <h5 class="m-0 fw-bold">Statistiques des Visites</h5>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-light rounded-pill" type="button" id="statsDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-more-2-line"></i> Options
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li><a class="dropdown-item" href="#"><i class="ri-calendar-line me-2"></i>Dernière Semaine</a></li>
                                <li><a class="dropdown-item" href="#"><i class="ri-calendar-2-line me-2"></i>Dernier Mois</a></li>
                                <li><a class="dropdown-item" href="#"><i class="ri-calendar-event-line me-2"></i>Année</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <canvas id="visitesChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section de filtrage améliorée -->
        <div class="card border-0 shadow-sm rounded-3 mt-4 overflow-hidden">
            <div class="card-header bg-primary text-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-0"><i class="ri-filter-line me-2"></i>Filtrer les Visites</h5>
                    <button class="btn btn-sm btn-light rounded-pill" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse">
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                </div>
            </div>
            <div class="collapse show" id="filterCollapse">
                <div class="card-body p-4">
                    <form method="GET" id="filterForm" class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label small text-muted">Date</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="ri-calendar-line"></i></span>
                                <input type="date" name="date_enr" class="form-control border-start-0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small text-muted">Vente Directe</label>
                            <select name="vente_directe" class="form-select">
                                <option value="">Tous</option>
                                <option value="NA">NA</option>
                                <option value="OUI">OUI</option>
                                <option value="NON">NON</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small text-muted">Visite Site</label>
                            <select name="visite_site" class="form-select">
                                <option value="">Tous</option>
                                <option value="NA">NA</option>
                                <option value="OUI">OUI</option>
                                <option value="NON">NON</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label small text-muted">Vente</label>
                            <select name="vente" class="form-select">
                                <option value="">Tous</option>
                                <option value="NA">NA</option>
                                <option value="OUI">OUI</option>
                                <option value="NON">NON</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end mt-2">
                            <button type="submit" class="btn btn-primary rounded-pill px-4">
                                <i class="ri-filter-line me-1"></i> Appliquer
                            </button>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary rounded-pill px-4 ms-2">
                                <i class="ri-refresh-line me-1"></i> Réinitialiser
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Résultats améliorés -->
        <div class="card border-0 shadow-sm rounded-3 mt-4 overflow-hidden" id="resultatsFiltrage">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="m-0 fw-bold"><i class="ri-list-check-2 me-2"></i>Résultats des Visites</h5>
            </div>
            <div class="card-body p-0">
                @if (!empty($filtresActifs))
                    <div class="alert alert-light border-bottom rounded-0 d-flex justify-content-between align-items-center p-3">
                        <div>
                            <h6 class="mb-2 fw-bold"><i class="ri-information-line me-2"></i>Filtres appliqués</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($filtresActifs as $nomFiltre => $valeur)
                                    <span class="badge bg-light text-dark border rounded-pill px-3 py-1">
                                        <i class="ri-filter-line me-1"></i> {{ $nomFiltre }}: {{ $valeur }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary rounded-pill px-3 py-2">
                                <i class="ri-search-eye-line me-1"></i> {{ $nombreResultats }} visite(s) trouvée(s)
                            </span>
                        </div>
                    </div>
                @endif

                @if ($visites->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-uppercase small fw-bold">Date</th>
                                    <th class="py-3 text-uppercase small fw-bold">Nom</th>
                                    <th class="py-3 text-uppercase small fw-bold">Entreprise ou Particulier</th>
                                    <th class="py-3 text-uppercase small fw-bold">Raison</th>
                                    <th class="py-3 text-uppercase small fw-bold">Statut</th>
                                    <th class="pe-4 py-3 text-uppercase small fw-bold text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visites as $visite)
                                    <tr class="border-top">
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                                    <i class="ri-calendar-event-line text-primary"></i>
                                                </div>
                                                <span class="fw-medium">{{ $visite->date_enr }}</span> 
                                            </div>
                                            <small class="text-muted">{{ $visite->created_at->diffForHumans() }}</small>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-info bg-opacity-10 p-2 rounded me-3">
                                                    <i class="ri-user-line text-info"></i>
                                                </div>
                                                <span>{{ $visite->nom }} {{ $visite->prenom }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border">
                                                {{ $visite->entreprise ?? 'Particulier' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;" title="{{ $visite->raison_visite }}">
                                                {{ $visite->raison_visite }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill bg-{{ $visite->statut == 'Terminé' ? 'success' : 'warning' }}-subtle text-{{ $visite->statut == 'Terminé' ? 'success' : 'warning' }} py-1 px-3">
                                                <i class="ri-{{ $visite->statut == 'Terminé' ? 'check-line' : 'time-line' }} me-1"></i> {{ $visite->statut }}
                                            </span>
                                        </td>
                                        <td class="pe-4 text-end">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('visite.show', $visite->id) }}" class="btn btn-sm btn-light rounded-circle me-2" title="Voir">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                                @if (Auth::check() && Auth::user()->statut == 3)
                                                <a href="{{ route('visite.edit', $visite->id) }}" class="btn btn-sm btn-light rounded-circle me-2" title="Modifier">
                                                    <i class="ri-edit-line"></i>
                                                </a>
                                                <form action="{{ route('visite.destroy', $visite->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette visite ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-light rounded-circle" title="Supprimer">
                                                        <i class="ri-delete-bin-line text-danger"></i>
                                                    </button>
                                                </form>
                                                @else
                                                    <button class="btn btn-sm btn-secondary rounded-circle"
                                                        title="Modifier" style="margin-right: 10px" disabled>
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <button class="btn btn-sm btn-secondary rounded-circle"
                                                        title="Supprimer" disabled>
                                                        <i class="ri-delete-bin-line text-danger"></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Affichage de {{ $visites->firstItem() }} à {{ $visites->lastItem() }} sur {{ $visites->total() }} entrées
                            </div>
                            <div>
                                {{ $visites->appends(request()->query())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center p-5">
                        <div class="mb-3">
                            <i class="ri-search-off-line text-muted" style="font-size: 5rem;"></i>
                        </div>
                        <h5 class="fw-bold text-muted">Aucun résultat trouvé</h5>
                        <p class="text-muted">Aucune visite ne correspond aux critères de filtrage sélectionnés.</p>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary rounded-pill px-4">
                            <i class="ri-refresh-line me-1"></i> Réinitialiser les filtres
                        </a>
                    </div>
                @endif
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
                                    borderRadius: 6
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false
                                    },
                                    tooltip: {
                                        backgroundColor: '#2a3042',
                                        titleFont: {
                                            size: 14,
                                            weight: 'bold'
                                        },
                                        bodyFont: {
                                            size: 12
                                        },
                                        padding: 12,
                                        cornerRadius: 8,
                                        displayColors: false
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        grid: {
                                            drawBorder: false,
                                            color: "rgba(0, 0, 0, 0.05)"
                                        },
                                        ticks: {
                                            padding: 12
                                        }
                                    },
                                    x: {
                                        grid: {
                                            display: false,
                                            drawBorder: false
                                        },
                                        ticks: {
                                            padding: 12
                                        }
                                    }
                                }
                            }
                        });
                    })
                    .catch(error => console.error("Erreur lors du chargement des statistiques :", error));

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

                // Pré-remplissage des filtres
                const params = new URLSearchParams(window.location.search);
                params.forEach((value, key) => {
                    const input = document.querySelector(`[name="${key}"]`);
                    if (input) input.value = value;
                });
            });
        </script>
    @endsection