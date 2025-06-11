@extends('layouts.template')
@section('content')
    <div class="container-fluid px-4">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="fw-800 text-gradient mb-1">Gestion des Visites</h1>
                        <p class="text-muted mb-0">Suivi complet des entrées et sorties des visiteurs</p>
                    </div>
                    @if (Auth::check() && Auth::user()->statut == 3)
                        <a href="{{ route('visite.create') }}" class="btn btn-primary shadow-sm">
                            <i class="fas fa-plus me-2"></i>Nouvelle Visite
                        </a>
                    @else
                        <button class="btn btn-primary shadow-sm" disabled>
                            <i class="fas fa-plus me-2"></i>Nouvelle Visite
                        </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Search Card -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-soft-hover">
                    <div class="card-body p-3">
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" id="search" class="form-control border-0 ps-0"
                                placeholder="Rechercher une visite..." onkeyup="filterTable()">
                            <span class="input-group-text bg-transparent border-0">
                                <span class="badge bg-primary-soft rounded-pill px-3 text-primary">
                                    {{ $visites->total() }} visites
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Table Card -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-soft-hover">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-borderless table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="fw-600 ps-4">Date</th>
                                        <th class="fw-600">Heures</th>
                                        <th class="fw-600">Visiteur</th>
                                        <th class="fw-600">Qualité</th>
                                        <th class="fw-600">Entreprise</th>
                                        <th class="fw-600">Contact</th>
                                        <th class="fw-600">Raison</th>
                                        <th class="fw-600 text-end pe-4">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (session('success_message'))
                                        <!-- Success Notification -->
                                        <div class="position-fixed top-4 end-4" style="z-index: 9999">
                                            <div class="toast show fade" role="alert" aria-live="assertive"
                                                aria-atomic="true">
                                                <div class="toast-header bg-success text-white">
                                                    <strong class="me-auto"><i
                                                            class="fas fa-check-circle me-2"></i>Succès</strong>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                                <div class="toast-body bg-white">
                                                    {{ session('success_message') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @foreach ($visites as $visite)
                                        <tr class="border-bottom">
                                            <td class="ps-4">
                                                <div class="d-flex flex-column">
                                                    <span class="fw-600">{{ $visite->date_enr }}</span>
                                                    <small
                                                        class="text-muted">{{ $visite->created_at->diffForHumans() }}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <span
                                                        class="badge bg-primary-soft rounded-pill px-3 mb-1 w-fit-content text-primary">
                                                        <i class="fas fa-sign-in-alt me-1 text-primary"></i>
                                                        {{ $visite->heure_entree }}
                                                    </span>
                                                    @if ($visite->heure_sortie)
                                                        <span
                                                            class="badge bg-success-soft rounded-pill px-3 w-fit-content text-danger">
                                                            <i class="fas fa-sign-out-alt me-1 text-success"></i>
                                                            {{ $visite->heure_sortie }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-shape bg-primary-soft rounded-circle me-3 p-2">
                                                        <i class="fas fa-user text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-600">{{ $visite->prenom }} {{ $visite->nom }}
                                                        </h6>
                                                        <small class="text-muted">ID:
                                                            VIS-{{ str_pad($visite->id, 4, '0', STR_PAD_LEFT) }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-info-soft rounded-pill px-3 py-1 text-primary">
                                                    {{ $visite->qualite_personne }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="icon-shape bg-warning-soft rounded-circle me-3 p-2">
                                                        <i class="fas fa-building text-warning"></i>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0 fw-600">{{ Str::limit($visite->entreprise, 15) }}
                                                        </h6>
                                                        <small class="text-muted">Entreprise</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="tel:{{ $visite->telephone }}" class="text-decoration-none">
                                                        <span class="d-flex align-items-center mb-1">
                                                            <i class="fas fa-phone text-muted me-2"></i>
                                                            <small>{{ $visite->telephone }}</small>
                                                        </span>
                                                    </a>
                                                    <a href="mailto:{{ $visite->email }}" class="text-decoration-none">
                                                        <span class="d-flex align-items-center">
                                                            <i class="fas fa-envelope text-muted me-2"></i>
                                                            <small>{{ Str::limit($visite->email, 10) }}</small>
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary-soft rounded-pill px-3 py-1 text-primary">
                                                    {{ Str::limit($visite->raison_visite, 15) }}
                                                </span>
                                            </td>
                                            <td class="pe-4">
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('visite.show', $visite->id) }}"
                                                        class="btn btn-sm btn-icon-only btn-outline-info rounded-circle me-2"
                                                        data-bs-toggle="tooltip" title="Voir détails">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    @if (Auth::check() && Auth::user()->statut == 3)
                                                        <a href="{{ route('visite.edit', $visite->id) }}"
                                                            class="btn btn-sm btn-icon-only btn-outline-warning rounded-circle me-2"
                                                            data-bs-toggle="tooltip" title="Modifier">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="{{ route('visite.destroy', $visite->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-icon-only btn-outline-danger rounded-circle"
                                                                data-bs-toggle="tooltip" title="Supprimer"
                                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette visite ?');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <button class="btn btn-sm btn-secondary rounded-circle"
                                                            title="Modifier" style="margin-right: 10px" disabled>
                                                            <i class="fas fa-pen"></i>
                                                        </button>

                                                        <button class="btn btn-sm btn-secondary rounded-circle"
                                                            title="Supprimer" disabled>
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation">
                        {{ $visites->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function filterTable() {
            let input = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Auto-hide success message
        @if (session('success_message'))
            setTimeout(() => {
                var toastEl = document.querySelector('.toast');
                var toast = bootstrap.Toast.getInstance(toastEl);
                toast.hide();
            }, 5000);
        @endif
    </script>

    <style>
        :root {
            --primary: #5e72e4;
            --primary-soft: #f0f5ff;
            --success: #2dce89;
            --success-soft: #f0fff4;
            --info: #11cdef;
            --info-soft: #e6f9ff;
            --warning: #fb6340;
            --warning-soft: #fff6f3;
            --danger: #f5365c;
            --danger-soft: #fff5f7;
            --secondary: #8898aa;
            --secondary-soft: #f8f9fa;
        }

        body {
            background-color: #f8fafc;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .text-gradient {
            background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-primary-soft {
            background-color: var(--primary-soft);
        }

        .bg-success-soft {
            background-color: var(--success-soft);
        }

        .bg-info-soft {
            background-color: var(--info-soft);
        }

        .bg-warning-soft {
            background-color: var(--warning-soft);
        }

        .bg-danger-soft {
            background-color: var(--danger-soft);
        }

        .bg-secondary-soft {
            background-color: var(--secondary-soft);
        }

        .card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            overflow: hidden;
            background-color: #fff;
        }

        .shadow-soft-hover {
            box-shadow: 0 0.5rem 1.5rem -0.5rem rgba(0, 0, 0, 0.06);
        }

        .shadow-soft-hover:hover {
            box-shadow: 0 1rem 3rem -1rem rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .icon-shape {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
        }

        .fw-600 {
            font-weight: 600;
        }

        .fw-800 {
            font-weight: 800;
        }

        .table-borderless td,
        .table-borderless th {
            border: 0;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .badge {
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .bg-light {
            background-color: #f8fafc !important;
        }

        .border-bottom {
            border-bottom: 1px solid rgba(0, 0, 0, 0.03) !important;
        }

        .w-fit-content {
            width: fit-content;
        }

        .btn-icon-only {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .input-group-text {
            background-color: transparent;
        }

        .toast {
            border: none;
            box-shadow: 0 0.5rem 1.5rem -0.5rem rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            overflow: hidden;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .pagination .page-link {
            color: var(--primary);
            border-radius: 8px !important;
            margin: 0 3px;
            border: none;
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background-color: var(--primary-soft);
        }
    </style>

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Include Bootstrap JS for tooltips -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts -->
    <script>
        function filterTable() {
            let input = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll("tbody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Auto-hide success message
        @if (session('success_message'))
            setTimeout(() => {
                var toastEl = document.querySelector('.toast');
                var toast = bootstrap.Toast.getInstance(toastEl);
                toast.hide();
            }, 5000);
        @endif
    </script>

    <style>
        :root {
            --primary: #5e72e4;
            --primary-soft: #f0f5ff;
            --success: #2dce89;
            --success-soft: #f0fff4;
            --info: #11cdef;
            --info-soft: #e6f9ff;
            --warning: #fb6340;
            --warning-soft: #fff6f3;
            --danger: #f5365c;
            --danger-soft: #fff5f7;
            --secondary: #8898aa;
            --secondary-soft: #f8f9fa;
        }

        body {
            background-color: #f8fafc;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        .text-gradient {
            background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-primary-soft {
            background-color: var(--primary-soft);
        }

        .bg-success-soft {
            background-color: var(--success-soft);
        }

        .bg-info-soft {
            background-color: var(--info-soft);
        }

        .bg-warning-soft {
            background-color: var(--warning-soft);
        }

        .bg-danger-soft {
            background-color: var(--danger-soft);
        }

        .bg-secondary-soft {
            background-color: var(--secondary-soft);
        }

        .card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            overflow: hidden;
            background-color: #fff;
        }

        .shadow-soft-hover {
            box-shadow: 0 0.5rem 1.5rem -0.5rem rgba(0, 0, 0, 0.06);
        }

        .shadow-soft-hover:hover {
            box-shadow: 0 1rem 3rem -1rem rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .icon-shape {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
        }

        .fw-600 {
            font-weight: 600;
        }

        .fw-800 {
            font-weight: 800;
        }

        .table-borderless td,
        .table-borderless th {
            border: 0;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .badge {
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .bg-light {
            background-color: #f8fafc !important;
        }

        .border-bottom {
            border-bottom: 1px solid rgba(0, 0, 0, 0.03) !important;
        }

        .w-fit-content {
            width: fit-content;
        }

        .btn-icon-only {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .input-group-text {
            background-color: transparent;
        }

        .toast {
            border: none;
            box-shadow: 0 0.5rem 1.5rem -0.5rem rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            overflow: hidden;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .pagination .page-link {
            color: var(--primary);
            border-radius: 8px !important;
            margin: 0 3px;
            border: none;
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background-color: var(--primary-soft);
        }
    </style>

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Include Bootstrap JS for tooltips -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
