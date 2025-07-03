@extends('layouts.template')

@section('content')
<div class="container py-5">
    <!-- En-tête avec bouton d'action -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-light">Nos Produits Exceptionnels</h1>
            <p class="text-muted">Découvrez notre collection exclusive</p>
        </div>
        <div>
            <button class="btn btn-outline-dark rounded-pill px-4">
                <i class="bi bi-filter me-2"></i>Filtrer
            </button>
        </div>
    </div>

    <!-- Grille de produits -->
    <div class="row g-4">
        @foreach($produit_all as $produit)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card border-0 h-100 product-card">
                <!-- Badge promotionnel optionnel -->
                @if(rand(0,1))
                <div class="badge bg-danger position-absolute m-2">-20%</div>
                @endif
                
                <!-- Image du produit -->
                <div class="product-image-container">
                    @if($produit->photo)
                    <img src="{{ asset($produit->photo) }}" class="card-img-top product-image" alt="{{ $produit->nom }}">
                    @else
                    <img src="{{ asset('default.png') }}" class="card-img-top product-image" alt="Aucune image">
                    @endif
                    <div class="product-overlay">
                        <button class="btn btn-dark rounded-pill px-4 quick-view">
                            <i class="bi bi-eye me-2"></i>Voir détails
                        </button>
                    </div>
                </div>
                
                <!-- Corps de la carte -->
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title mb-0">{{ $produit->nom }}</h5>
                        <button class="btn btn-outline-secondary btn-sm rounded-circle">
                            <i class="bi bi-heart"></i>
                        </button>
                    </div>
                    
                    <!-- Évaluation en étoiles -->
                    <div class="mb-3">
                        <div class="rating-stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= rand(3,5) ? '-fill' : '' }} text-warning"></i>
                            @endfor
                            <span class="text-muted ms-2 small">({{ rand(10, 200) }})</span>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="card-text fw-bold text-dark mb-0">${{ number_format($produit->prix, 2, ',', ' ') }}</p>
                            @if(rand(0,1))
                            <small class="text-muted text-decoration-line-through">${{ number_format($produit->prix * 1.2, 2, ',', ' ') }}</small>
                            @endif
                        </div>
                        <button class="btn btn-dark rounded-pill px-3 add-to-cart">
                            <i class="bi bi-cart-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination stylisée -->
    <div class="mt-5 d-flex justify-content-center">
        <nav aria-label="Page navigation">
            {{ $produit_all->links() }}
        </nav>
    </div>
</div>

<style>
    /* Styles personnalisés */
    .product-card {
        transition: all 0.3s ease;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .product-image-container {
        position: relative;
        overflow: hidden;
        height: 220px;
    }
    
    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .product-card:hover .product-image {
        transform: scale(1.05);
    }
    
    .product-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .product-card:hover .product-overlay {
        opacity: 1;
    }
    
    .quick-view {
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }
    
    .product-card:hover .quick-view {
        transform: translateY(0);
    }
    
    .add-to-cart {
        transition: all 0.3s ease;
    }
    
    .add-to-cart:hover {
        background-color: #333 !important;
        transform: scale(1.1);
    }
    
    .rating-stars {
        font-size: 0.9rem;
    }
</style>
@endsection