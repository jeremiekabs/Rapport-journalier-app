@extends('layouts.template')

@section('content')
    <div class="container-fluid px-4 px-xxl-5 py-5">
        <!-- Glass card with premium styling -->
        <div class="card border-0 overflow-hidden shadow-xxl"
            style="
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(12px);
        border-radius: 1.25rem;
    ">
            <!-- Gradient header with animated pattern -->
            <div class="card-header position-relative py-4"
                style="
            background: linear-gradient(135deg, #00b894 0%, #55efc4 100%);
            border-bottom: 0;
        ">
                <div class="position-absolute top-0 end-0 w-100 h-100 opacity-10"
                    style="
                background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
            ">
                </div>

                <div class="d-flex justify-content-between align-items-center position-relative">
                    <div>
                        <h2 class="mb-0 text-white fw-bold display-6">
                            <i class="ri-shopping-bag-3-line me-2"></i>
                            Historique des Ventes
                        </h2>
                        <p class="text-white-50 mb-0">Toutes vos transactions commerciales</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <span class="badge bg-white bg-opacity-20 text-primary">Total: {{ $ventes->total() }}
                                ventes</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body p-4 p-md-5">
                <!-- Premium search bar -->
                <div class="mb-5">
                    <div class="input-group input-group-lg shadow-sm">
                        <span class="input-group-text bg-success bg-opacity-10 border-end-0">
                            <i class="ri-search-line text-success"></i>
                        </span>
                        <input type="text" id="search" class="form-control border-start-0 ps-3"
                            placeholder="Rechercher une vente..." onkeyup="filterTable()">
                        <button class="btn btn-success bg-gradient text-success" type="button">
                            <i class="ri-filter-2-line me-1 text-success"></i> Filtrer
                        </button>
                    </div>
                </div>

                <!-- Premium table with hover effects -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="min-width: 750px">
                        <thead>
                            <tr class="bg-success bg-opacity-10 text-success">
                                <th class="border-0 rounded-start ps-4 py-3 fw-bold">
                                    <i class="ri-box-2-line me-2"></i> Produit
                                </th>
                                <th class="border-0 text-center py-3 fw-bold">
                                    <i class="ri-box-2-line me-2"></i> Quantité
                                </th>
                                <th class="border-0 text-center py-3 fw-bold">
                                    <i class="ri-money-dollar-circle-line me-2"></i> Montant
                                </th>
                                <th class="border-0 rounded-end text-center pe-4 py-3 fw-bold">
                                    <i class="ri-calendar-2-line me-2"></i> Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('success'))
                                <!-- Success Notification -->
                                <div class="position-fixed top-4 end-4" style="z-index: 9999">
                                    <div class="toast show fade" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header bg-success text-white">
                                            <strong class="me-auto"><i class="fas fa-check-circle me-2"></i>Succès</strong>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body bg-white">
                                            {{ session('success_message') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @forelse ($ventes as $vente)
                                <tr class="hover-scale shadow-xs transition-all">
                                    <td class="ps-4 py-3 border-0">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-3">
                                                <div
                                                    class="avatar avatar-sm bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="ri-shopping-cart-2-line fs-5"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 fw-semibold">{{ $vente->produit->nom }}</h6>
                                                <small class="text-muted">Ref: VENTE-{{ $vente->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center border-0">
                                        <span class="badge bg-success bg-opacity-20 text-white py-2 px-3">
                                            {{ $vente->quantite }} unités
                                        </span>
                                    </td>
                                    <td class="text-center border-0">
                                        <span class="fw-bold text-dark">{{ number_format($vente->prix_total, 2) }} $</span>
                                        @if ($vente->prix_nego)
                                            <small class="d-block text-success">(Négocié)</small>
                                        @endif
                                    </td>
                                    <td class="text-center pe-4 border-0">
                                        <div class="d-inline-flex flex-column">
                                            <span class="text-dark">{{ $vente->created_at->format('d/m/Y H:i') }}</span>
                                            <small class="text-muted">{{ $vente->created_at->diffForHumans() }}</small>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 border-0">
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <i class="ri-shopping-basket-line text-muted fs-1 mb-3"></i>
                                            <h5 class="text-muted mb-2">Aucune vente enregistrée</h5>
                                            <p class="text-muted small">Commencez à vendre pour voir apparaître vos
                                                transactions</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Premium pagination -->
                @if ($ventes->hasPages())
                    <div class="d-flex justify-content-center mt-5">
                        <nav class="pagination-container">
                            {{ $ventes->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                @endif
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to table rows
            const tableRows = document.querySelectorAll('.table-hover tbody tr');
            tableRows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateY(10px)';
                row.style.transition = `all 0.3s ease ${index * 0.05}s`;

                setTimeout(() => {
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, 100);
            });

            function filterTable() {
                let input = document.getElementById("search").value.toLowerCase();
                let rows = document.querySelectorAll("tbody tr");

                rows.forEach(row => {
                    let text = row.textContent.toLowerCase();
                    if (text.includes(input)) {
                        row.style.display = "";
                        row.classList.add('animate__animated', 'animate__fadeIn');
                    } else {
                        row.style.display = "none";
                    }
                });
            }
        });
    </script>

    <style>
        /* Premium styling */
        .shadow-xxl {
            box-shadow: 0 25px 50px -12px rgba(0, 184, 148, 0.15);
        }

        .hover-scale {
            transition: all 0.3s ease;
            transform-origin: center;
        }

        .hover-scale:hover {
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            background-color: rgba(0, 184, 148, 0.03) !important;
        }

        .shadow-xs {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        .bg-gradient {
            background: linear-gradient(135deg, #00b894 0%, #55efc4 100%);
            border: none;
        }

        .bg-gradient:hover {
            background: linear-gradient(135deg, #00a884 0%, #44dfb4 100%);
        }

        .table-hover tbody tr {
            cursor: pointer;
            border-radius: 0.75rem;
            overflow: hidden;
        }

        .table-hover tbody tr td {
            position: relative;
            z-index: 1;
        }

        .table-hover tbody tr:hover::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(to bottom, #00b894, #55efc4);
        }

        .pagination-container .page-item.active .page-link {
            background: linear-gradient(135deg, #00b894 0%, #55efc4 100%);
            border-color: transparent;
        }

        .pagination-container .page-link {
            border-radius: 0.5rem !important;
            margin: 0 3px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .avatar {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        /* Animation for search */
        .animate__fadeIn {
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }

            .table-responsive {
                border-radius: 0.75rem;
                overflow: hidden;
                border: 1px solid rgba(0, 0, 0, 0.05);
            }

            .card-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
@endsection
