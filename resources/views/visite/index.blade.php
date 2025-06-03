@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3 text-center">📝 Liste des Visites</h2>

        <!-- Barre de recherche -->
        <div class="mb-3">
            <input type="text" id="search" class="form-control" placeholder="🔍 Rechercher une visite..."
                onkeyup="filterTable()">
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Heure d'entrée</th>
                        <th>Heure de sortie</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Qualité</th>
                        <th>Entreprise</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Raison</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (session('success_message'))
                        <!-- Modal de succès -->
                        <div class="modal fade show" id="successModal" tabindex="-1" role="dialog"
                            aria-labelledby="successModalLabel" aria-hidden="true"
                            style="display:block; background: rgba(0, 0, 0, 0.5);">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content shadow-lg border-success">
                                    <div class="modal-header bg-success text-white">
                                        <h5 class="modal-title" id="successModalLabel">✅ Succès</h5>
                                    </div>
                                    <div class="modal-body text-center">
                                        <i class="ri-check-line ri-3x text-success"></i>
                                        <p class="mt-2">{{ session('success_message') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach ($visites as $visite)
                        <tr>
                            <td>{{ $visite->date_enr }}</td>
                            <td>{{ $visite->heure_entree }}</td>
                            <td>{{ $visite->heure_sortie }}</td>
                            <td>{{ Str::limit($visite->nom, 5) }}</td>
                            <td>{{ Str::limit($visite->prenom, 5) }}</td>
                            <td>{{ Str::limit($visite->qualite_personne, 5) }}</td>
                            <td>{{ Str::limit($visite->entreprise, 5) }}</td>
                            <td>{{ Str::limit($visite->telephone, 5) }}</td>
                            <td>{{ Str::limit($visite->email, 5) }}</td>
                            <td>{{ Str::limit($visite->raison_visite, 5) }}</td>
                            <td>
                                <a href="{{ route('visite.show', $visite->id) }}" class="text-info mx-2" title="Voir">
                                    <i class="ri-eye-line ri-lg"></i>
                                </a>

                                <a href="{{ route('visite.edit', $visite->id) }}" class="text-warning mx-2"
                                    title="Modifier">
                                    <i class="ri-edit-line ri-lg"></i>
                                </a>

                                <form action="{{ route('visite.destroy', $visite->id) }}" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette visite ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent text-danger mx-2"
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

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $visites->links() }}
        </div>
    </div>

    <!-- Script pour filtrer les résultats -->
    <script>
        function filterTable() {
            let input = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
        setTimeout(() => {
            document.getElementById('successModal').style.display = 'none';
        }, 3000);
    </script>
@endsection
