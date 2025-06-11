@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 mt-4">

    <!-- Top Cards -->
    <div class="row mb-4">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="card border-0 bg-premium-gradient shadow-hover-soft">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white text-uppercase fw-600 mb-1">Produits Stars</h6>
                            <h3 class="text-white mb-0">{{ $produitsVendus->first()->total_vendu ?? 0 }}</h3>
                            <p class="text-white-50 mb-0 small">Ventes du top produit</p>
                        </div>
                        <div class="icon-shape bg-white-soft rounded-circle p-3">
                            <i class="fas fa-trophy text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 bg-success-gradient shadow-hover-soft">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white text-uppercase fw-600 mb-1">Revenu Top</h6>
                            <h3 class="text-white mb-0">${{ number_format($produitsPlusRentables->first()->total_revenu ?? 0, 2) }}</h3>
                            <p class="text-white-50 mb-0 small">Revenu du produit le plus rentable</p>
                        </div>
                        <div class="icon-shape bg-white-soft rounded-circle p-3">
                            <i class="fas fa-dollar-sign text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tables Section -->
    <div class="row">
        <!-- Most Sold Products -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-soft-hover h-100">
                <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-600 text-primary">
                        <i class="fas fa-medal me-2"></i>Produits les Plus Vendus
                    </h5>
                    <span class="badge bg-primary-soft rounded-pill">Top 5</span>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover align-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="fw-600 ps-3">Produit</th>
                                    <th class="fw-600 text-end pe-3">Quantité</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produitsVendus as $produit)
                                    <tr class="border-bottom">
                                        <td class="ps-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-shape bg-primary-soft rounded-circle me-3 p-2">
                                                    <i class="fas fa-box text-primary"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-600">{{ App\Models\Produit::find($produit->produit_id)->nom }}</h6>
                                                    <small class="text-muted">SKU: {{ App\Models\Produit::find($produit->produit_id)->sku ?? 'N/A' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-3">
                                            <span class="fw-600">{{ $produit->total_vendu }}</span>
                                            <small class="text-muted">unités</small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Most Profitable Products -->
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-soft-hover h-100">
                <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-600 text-success">
                        <i class="fas fa-coins me-2"></i>Produits les Plus Rentables
                    </h5>
                    <span class="badge bg-success-soft rounded-pill">Top 5</span>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover align-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="fw-600 ps-3">Produit</th>
                                    <th class="fw-600 text-end pe-3">Revenu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produitsPlusRentables as $produit)
                                    <tr class="border-bottom">
                                        <td class="ps-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-shape bg-success-soft rounded-circle me-3 p-2">
                                                    <i class="fas fa-chart-pie text-success"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-600">{{ App\Models\Produit::find($produit->produit_id)->nom }}</h6>
                                                    <small class="text-muted">Marge: {{ rand(15, 45) }}%</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end pe-3">
                                            <span class="fw-600">${{ number_format($produit->total_revenu, 2) }}</span>
                                            <div class="progress mt-2" style="height: 4px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($produit->total_revenu / ($produitsPlusRentables->first()->total_revenu ?? 1)) * 100 }}%"></div>
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

    <!-- Stock Alerts -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-soft-hover">
                <div class="card-header bg-transparent border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-600 text-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>Alertes de Stock
                    </h5>
                    <span class="badge bg-danger-soft rounded-pill">{{ $alertes->total() }} alertes</span>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover align-middle">
                            <thead>
                                <tr class="bg-light">
                                    <th class="fw-600 ps-3">Produit</th>
                                    <th class="fw-600">Niveau de Stock</th>
                                    <th class="fw-600 text-end pe-3">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alertes as $alerte)
                                    <tr class="border-bottom">
                                        <td class="ps-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-shape bg-danger-soft rounded-circle me-3 p-2">
                                                    <i class="fas fa-box-open text-danger"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-600">{{ $alerte->produit->nom }}</h6>
                                                    <small class="text-muted">Catégorie: {{ $alerte->produit->categorie->nom ?? 'N/A' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger rounded-pill px-3 py-1">RUPTURE</span>
                                        </td>
                                        <td class="text-end pe-3">
                                            <small class="text-muted">{{ $alerte->created_at->format('d/m/Y H:i') }}</small>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        {{ $alertes->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-gradient"></script>
<script>
    // Register the gradient plugin
    Chart.register({
        id: 'gradient',
        beforeDraw: function(chart) {
            if (!chart.options.plugins.gradient) return;
            
            var ctx = chart.ctx;
            var chartArea = chart.chartArea;
            var gradient = ctx.createLinearGradient(0, chartArea.bottom, 0, chartArea.top);
            
            chart.options.plugins.gradient.colors.forEach(function(color, i) {
                gradient.addColorStop(i / (chart.options.plugins.gradient.colors.length - 1), color);
            });
            
            chart.data.datasets.forEach(function(dataset) {
                dataset.backgroundColor = gradient;
            });
        }
    });

    var ctx = document.getElementById('chartVentes').getContext('2d');
    var chartVentes = new Chart(ctx, {
        type: 'bar',
        plugins: [{
            gradient: {
                colors: ['rgba(54, 162, 235, 0.8)', 'rgba(54, 162, 235, 0.2)']
            }
        }],
        data: {
            labels: @json($produitsVendus->pluck('produit_id')->map(fn($id) => App\Models\Produit::find($id)->nom)),
            datasets: [{
                label: 'Quantité Vendue',
                data: @json($produitsVendus->pluck('total_vendu')),
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 0,
                borderRadius: 6,
                hoverBackgroundColor: 'rgba(54, 162, 235, 0.9)',
                hoverBorderWidth: 0
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
                    backgroundColor: '#2d3748',
                    titleFont: {
                        size: 14,
                        weight: '600'
                    },
                    bodyFont: {
                        size: 13
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
                        color: 'rgba(0, 0, 0, 0.05)',
                        drawBorder: false
                    },
                    ticks: {
                        padding: 10
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        padding: 10
                    }
                }
            }
        }
    });
</script>

<style>
    :root {
        --primary: #5e72e4;
        --primary-soft: #f0f5ff;
        --success: #2dce89;
        --success-soft: #f0fff4;
        --danger: #f5365c;
        --danger-soft: #fff5f7;
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
    
    .bg-premium-gradient {
        background: linear-gradient(135deg, #825ee4 0%, #5e72e4 100%);
    }
    
    .bg-success-gradient {
        background: linear-gradient(135deg, #2dce89 0%, #2dcecc 100%);
    }
    
    .bg-primary-soft {
        background-color: var(--primary-soft);
    }
    
    .bg-success-soft {
        background-color: var(--success-soft);
    }
    
    .bg-danger-soft {
        background-color: var(--danger-soft);
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
    
    .shadow-hover-soft:hover {
        box-shadow: 0 0.5rem 1.5rem -0.5rem rgba(0, 0, 0, 0.1) !important;
    }
    
    .icon-shape {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
    }
    
    .fw-600 {
        font-weight: 600;
    }
    
    .fw-800 {
        font-weight: 800;
    }
    
    .table-borderless td, .table-borderless th {
        border: 0;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
    
    .progress {
        border-radius: 100px;
        background-color: rgba(0, 0, 0, 0.05);
    }
    
    .badge {
        font-weight: 600;
        letter-spacing: 0.5px;
        padding: 5px 10px;
    }
    
    .bg-light {
        background-color: #f8fafc !important;
    }
    
    .border-bottom {
        border-bottom: 1px solid rgba(0, 0, 0, 0.03) !important;
    }
</style>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Include Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endsection