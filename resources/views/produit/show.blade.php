@extends('layouts.template')

@section('content')
<div class="container-fluid product-showcase">
    <div class="row g-0">
        <!-- Sidebar with product image -->
        <div class="col-lg-3 product-sidebar">
            <div class="product-image-container">
                <div class="product-image-placeholder">
                    <i class="fas fa-box-open"></i>
                </div>
                <h1 class="product-title">{{ $produit->nom }}</h1>
                <div class="category-badge">
                    <span class="badge">
                        <i class="fas fa-tags me-2"></i>{{ $produit->categorie->nom }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="col-lg-9 product-details">
            <div class="detail-grid">
                <!-- Row 1 -->
                <div class="detail-card profit-card">
                    <div class="icon-wrapper">
                        <i class="fas fa-money-bill-trend-up"></i>
                    </div>
                    <div class="detail-content">
                        <h3>Gain</h3>
                        <p class="value">{{ number_format($produit->gain, 2) }} $</p>
                        <div class="profit-indicator">
                            <i class="fas fa-arrow-up"></i>
                            <span>+{{ $produit->prix_achatd }}%</span>
                        </div>
                    </div>
                </div>

                <div class="detail-card stock-card">
                    <div class="icon-wrapper">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <div class="detail-content">
                        <h3>Stock</h3>
                        <p class="value">{{ $produit->stock }} unités</p>
                        <div class="stock-level">
                            @php
                                $stockLevel = min(100, ($produit->stock/50)*100);
                            @endphp
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $stockLevel }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="detail-card price-card">
                    <div class="icon-wrapper">
                        <i class="fas fa-cash-register"></i>
                    </div>
                    <div class="detail-content">
                        <h3>Prix de vente</h3>
                        <p class="value">{{ number_format($produit->prix, 2) }} $</p>
                        <div class="price-comparison">
                            <span class="original-price">{{ number_format($produit->prix_achat, 2) }} $</span>
                            <span class="price-difference">+{{ number_format($produit->gain, 2) }} $</span>
                        </div>
                    </div>
                </div>

                <div class="detail-card performance-card">
                    <div class="icon-wrapper">
                        <i class="fas fa-chart-simple"></i>
                    </div>
                    <div class="detail-content">
                        <h3>Indice sur le prix</h3>
                        <p class="value">{{ $produit->indice }}</p>
                        <div class="performance-gauge">
                            @php
                                $indiceWidth = min(100, max(0, ($produit->indice/5)*100));
                            @endphp
                            <div class="gauge-track">
                                <div class="gauge-value" style="width: {{ $indiceWidth }}%"></div>
                            </div>
                            <div class="gauge-labels">
                                <span>Faible</span>
                                <span>Moyen</span>
                                <span>Élevé</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="detail-card description-card">
                    <div class="icon-wrapper">
                        <i class="fas fa-align-left"></i>
                    </div>
                    <div class="detail-content">
                        <h3>Description</h3>
                        <p class="description-text">{{ $produit->description }}</p>
                    </div>
                </div>

                <!-- Row 4 - Action buttons -->
                <div class="action-buttons">
                    <a href="{{route('produits.edit', $produit->id)}}" class="btn btn-edit">
                        <i class="fas fa-edit me-2">Modifier</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --accent-color: #4895ef;
        --danger-color: #f72585;
        --success-color: #4cc9f0;
        --warning-color: #f8961e;
        --dark-color: #212529;
        --light-color: #f8f9fa;
    }

    .product-showcase {
        height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 0;
        overflow: hidden;
    }

    .product-sidebar {
        background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
        color: white;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        box-shadow: 5px 0 15px rgba(0,0,0,0.1);
    }

    .product-image-container {
        text-align: center;
    }

    .product-image-placeholder {
        width: 200px;
        height: 200px;
        margin: 0 auto 2rem;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        color: white;
        border: 5px solid rgba(255,255,255,0.2);
        transition: all 0.3s ease;
    }

    .product-image-placeholder:hover {
        transform: scale(1.05);
        background: rgba(255,255,255,0.15);
    }

    .product-title {
        font-weight: 700;
        margin-bottom: 1.5rem;
        font-size: 2.2rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    .category-badge .badge {
        background: rgba(255,255,255,0.2);
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        font-weight: 500;
        border-radius: 50px;
        backdrop-filter: blur(5px);
    }

    .product-details {
        height: 100vh;
        overflow-y: auto;
        padding: 3rem;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .detail-card {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        border-left: 5px solid var(--primary-color);
    }

    .detail-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .icon-wrapper {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        font-size: 1.5rem;
        color: white;
        flex-shrink: 0;
    }

    .profit-card .icon-wrapper { background: var(--success-color); }
    .stock-card .icon-wrapper { background: var(--accent-color); }
    .price-card .icon-wrapper { background: var(--danger-color); }
    .performance-card .icon-wrapper { background: var(--warning-color); }
    .description-card .icon-wrapper { background: var(--primary-color); }

    .detail-content h3 {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--dark-color);
    }

    .value {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--dark-color);
    }

    .profit-indicator {
        display: flex;
        align-items: center;
        color: var(--success-color);
        font-weight: 500;
    }

    .profit-indicator i {
        margin-right: 0.5rem;
    }

    .stock-level .progress {
        height: 8px;
        border-radius: 4px;
        background: #e9ecef;
    }

    .stock-level .progress-bar {
        background: var(--accent-color);
        border-radius: 4px;
    }

    .price-comparison {
        display: flex;
        align-items: center;
    }

    .original-price {
        text-decoration: line-through;
        color: #6c757d;
        margin-right: 0.5rem;
        font-size: 0.9rem;
    }

    .price-difference {
        color: var(--danger-color);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .performance-gauge {
        margin-top: 0.5rem;
    }

    .gauge-track {
        height: 8px;
        background: #e9ecef;
        border-radius: 4px;
        margin-bottom: 0.3rem;
    }

    .gauge-value {
        height: 100%;
        background: linear-gradient(to right, #ff9a9e, #fad0c4);
        border-radius: 4px;
    }

    .gauge-labels {
        display: flex;
        justify-content: space-between;
        font-size: 0.7rem;
        color: #6c757d;
    }

    .description-card {
        grid-column: span 2;
    }

    .description-text {
        color: #495057;
        line-height: 1.6;
    }

    .action-buttons {
        grid-column: span 2;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: var(--primary-color);
        color: white;
    }

    .btn-stats {
        background: var(--warning-color);
        color: white;
    }

    .btn-back {
        background: var(--light-color);
        color: var(--dark-color);
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    @media (max-width: 992px) {
        .product-sidebar {
            height: auto;
            padding: 2rem 1rem;
        }
        
        .product-details {
            height: auto;
            padding: 2rem 1rem;
        }
        
        .detail-grid {
            grid-template-columns: 1fr;
        }
        
        .description-card, .action-buttons {
            grid-column: span 1;
        }
    }
</style>

<script>
    // Animation on load
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.detail-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 150);
        });
    });
</script>
@endsection