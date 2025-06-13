@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 px-xxl-5 py-5">
    <!-- Glass card with premium styling -->
    <div class="card border-0 overflow-hidden shadow-xxl" style="
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        border-radius: 1.25rem;
    ">
        <!-- Gradient header with animated pattern -->
        <div class="card-header position-relative py-4" style="
            background: linear-gradient(135deg, #7367F0 0%, #A66FFE 100%);
            border-bottom: 0;
        ">
            <div class="position-absolute top-0 end-0 w-100 h-100 opacity-10" style="
                background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3QgZmlsbD0idXJsKCNwYXR0ZXJuKSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIvPjwvc3ZnPg==');
            "></div>
            
            <div class="d-flex justify-content-between align-items-center position-relative">
                <div>
                    <h2 class="mb-0 text-white fw-bold display-6">
                        <i class="ri-alarm-warning-line me-2"></i>
                        Alertes de Stock
                    </h2>
                    <p class="text-white-50 mb-0">Surveillance des produits en rupture</p>
                </div>
                <a href="{{ route('vente.rupture') }}" class="btn btn-light btn-sm bg-white bg-opacity-20 hover-bg-opacity-30 transition-all">
                    <i class="ri-refresh-line me-1"></i> Rafraîchir
                </a>
            </div>
        </div>

        <div class="card-body p-4 p-md-5">
            <!-- Premium filter form -->
            <form method="GET" action="{{ route('stock.alerte') }}" class="mb-5">
                <div class="row g-3 align-items-end">
                    <div class="col-md-8">
                        <label class="form-label text-muted small fw-bold mb-2">FILTRER PAR PRODUIT</label>
                        <div class="input-group input-group-lg shadow-sm">
                            <span class="input-group-text bg-primary bg-opacity-10 border-end-0">
                                <i class="ri-filter-line text-primary"></i>
                            </span>
                            <select name="produit_id" class="form-select border-start-0 ps-3">
                                <option value="">Tous les produits</option>
                                @foreach ($produits as $id => $nom)
                                    <option value="{{ $id }}" {{ request('produit_id') == $id ? 'selected' : '' }}>
                                        {{ $nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100 btn-lg bg-gradient shadow-sm text-primary">
                            <i class="ri-search-line me-2"></i> Appliquer
                        </button>
                    </div>
                </div>
            </form>

            <!-- Premium table with hover effects -->
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="min-width: 750px">
                    <thead>
                        <tr class="bg-primary bg-opacity-10 text-primary">
                            <th class="border-0 rounded-start ps-4 py-3 fw-bold">Produit</th>
                            <th class="border-0 text-center py-3 fw-bold">Date d'alerte</th>
                            <th class="border-0 rounded-end text-end pe-4 py-3 fw-bold">Détails</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alertes as $alerte)
                        <tr class="hover-scale shadow-xs transition-all">
                            <td class="ps-4 py-3 border-0">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-sm bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="ri-box-2-line fs-5"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-semibold">{{ $alerte->produit->nom }}</h6>
                                        <small class="text-muted">Référence: PROD-{{ $alerte->produit->id }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center border-0">
                                <div class="d-inline-flex flex-column">
                                    <span class="badge bg-primary bg-opacity-10 text-primary mb-1">
                                        {{ $alerte->created_at->format('d/m/Y') }}
                                    </span>
                                    <small class="text-muted">{{ $alerte->created_at->diffForHumans() }}</small>
                                </div>
                            </td>
                            <td class="pe-4 text-end border-0">
                                <button class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    <i class="ri-eye-line me-1"></i> Détails
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-5 border-0">
                                <div class="d-flex flex-column align-items-center justify-content-center">
                                    <i class="ri-inbox-line text-muted fs-1 mb-3"></i>
                                    <h5 class="text-muted mb-2">Aucune alerte enregistrée</h5>
                                    <p class="text-muted small">Tous vos produits sont bien approvisionnés</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Premium pagination -->
            @if($alertes->hasPages())
            <div class="d-flex justify-content-center mt-5">
                <nav class="pagination-container">
                    {{ $alertes->onEachSide(1)->links('pagination::bootstrap-5') }}
                </nav>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
/* Premium styling */
.shadow-xxl {
    box-shadow: 0 25px 50px -12px rgba(115, 103, 240, 0.15);
}

.hover-scale {
    transition: all 0.3s ease;
    transform-origin: center;
}

.hover-scale:hover {
    transform: scale(1.01);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.shadow-xs {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
}

.transition-all {
    transition: all 0.3s ease;
}

.hover-bg-opacity-30:hover {
    background-opacity: 0.3 !important;
}

.bg-gradient {
    background: linear-gradient(135deg, #7367F0 0%, #A66FFE 100%);
    border: none;
}

.bg-gradient:hover {
    background: linear-gradient(135deg, #5d52d8 0%, #8e56e0 100%);
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

.table-hover tbody tr:hover {
    background-color: rgba(115, 103, 240, 0.05);
}

.table-hover tbody tr:hover::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 3px;
    height: 100%;
    background: linear-gradient(to bottom, #7367F0, #A66FFE);
}

.pagination-container .page-item.active .page-link {
    background: linear-gradient(135deg, #7367F0 0%, #A66FFE 100%);
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
}
</style>

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
    
    // Refresh button animation
    const refreshBtn = document.querySelector('.btn-refresh');
    if(refreshBtn) {
        refreshBtn.addEventListener('click', function(e) {
            e.preventDefault();
            this.innerHTML = '<i class="ri-refresh-line me-1"></i> Actualisation...';
            this.disabled = true;
            
            setTimeout(() => {
                window.location.reload();
            }, 800);
        });
    }
});
</script>
@endsection