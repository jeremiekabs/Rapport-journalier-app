@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 px-xxl-5 my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <!-- Header with animated gradient -->
            <div class="text-center mb-5">
                <h1 class="fw-bold display-5 mb-3 text-gradient-primary">
                    <span class="d-inline-flex align-items-center">
                        <i class="ri-shopping-cart-2-line me-3"></i>
                        <span>Effectuer une Vente</span>
                    </span>
                </h1>
                <a href="{{ route('vente.index')}}" class="btn btn-link text-decoration-none hover-scale">
                    <i class="ri-eye-line me-2"></i> Voir l'historique des ventes
                </a>
            </div>

            <!-- Premium card with glass morphism effect -->
            <div class="card border-0 shadow-lg overflow-hidden">
                <div class="card-header bg-primary bg-opacity-10 py-3 border-0">
                    <h3 class="mb-0 fw-semibold text-center">Nouvelle Transaction</h3>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    @if(session('alerte_stock'))
                        <div class="alert alert-danger border-0 shadow-sm d-flex align-items-center">
                            <i class="ri-error-warning-line me-2"></i>
                            {{ session('alerte_stock') }}
                        </div>
                    @endif

                    <form action="{{ route('vente.vendre') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        
                        <!-- Product selection with custom select styling -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold mb-3">Sélectionnez un produit</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-primary bg-opacity-10 border-end-0">
                                    <i class="ri-box-2-line text-primary"></i>
                                </span>
                                <select name="produit_id" class="form-select border-start-0 ps-3 shadow-none" required>
                                    @foreach($produits as $produit)
                                        <option value="{{ $produit->id }}" data-stock="{{ $produit->stock }}">
                                            {{ $produit->nom }} 
                                            <span class="badge bg-primary bg-opacity-10 text-primary ms-2">
                                                Stock: {{ $produit->stock }}
                                            </span>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Quantity and Negotiated Price -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold mb-3">Quantité</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-primary bg-opacity-10 border-end-0">
                                        <i class="ri-number-1 text-primary"></i>
                                    </span>
                                    <input type="number" name="quantite" 
                                           class="form-control border-start-0 ps-3 quantity-input" 
                                           min="1" 
                                           required
                                           placeholder="Quantité souhaitée">
                                    <span class="input-group-text bg-light">unités</span>
                                </div>
                                <div class="form-text mt-2 d-flex align-items-center">
                                    <i class="ri-information-line me-2"></i>
                                    Stock disponible: <span id="stock-display" class="fw-bold ms-1">{{ $produits[0]->stock ?? 0 }}</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-semibold mb-3">Prix négocié (optionnel)</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-primary bg-opacity-10 border-end-0">
                                        <i class="ri-money-dollar-circle-line text-primary"></i>
                                    </span>
                                    <input type="number" name="prix_nego" 
                                           class="form-control border-start-0 ps-3" 
                                           step="0.01" 
                                           placeholder="Prix personnalisé">
                                    <span class="input-group-text bg-light">€</span>
                                </div>
                                <div class="form-text mt-2 d-flex align-items-center">
                                    <i class="ri-information-line me-2"></i>
                                    Laissez vide pour utiliser le prix standard
                                </div>
                            </div>
                        </div>

                        <!-- Submit button with animation -->
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-lg btn-primary bg-gradient shadow-sm py-3">
                                <span class="d-flex align-items-center justify-content-center">
                                    <i class="ri-checkbox-circle-line me-2"></i>
                                    <span class="fw-semibold text-primary">Confirmer la vente</span>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Card footer with subtle pattern -->
                <div class="card-footer bg-primary bg-opacity-5 py-3 border-0">
                    <div class="text-center text-muted small">
                        <i class="ri-time-line me-1"></i> Transaction enregistrée en temps réel
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Dynamic stock display update script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update stock display when product changes
    const productSelect = document.querySelector('select[name="produit_id"]');
    const stockDisplay = document.getElementById('stock-display');
    const quantityInput = document.querySelector('.quantity-input');
    
    productSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const stock = selectedOption.getAttribute('data-stock');
        stockDisplay.textContent = stock;
        quantityInput.setAttribute('max', stock);
    });
    
    // Form validation
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
    
    // Add animation to hover elements
    const hoverElements = document.querySelectorAll('.hover-scale');
    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            el.classList.add('transition', 'transform', 'duration-300', 'hover:scale-105');
        });
        el.addEventListener('mouseleave', () => {
            el.classList.remove('transition', 'transform', 'duration-300', 'hover:scale-105');
        });
    });
});
</script>

<style>
/* Premium styling */
.text-gradient-primary {
    background: linear-gradient(135deg, #7367F0 0%, #A66FFE 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.card {
    border-radius: 1rem;
    overflow: hidden;
    transition: all 0.3s ease;
    background-color: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(115, 103, 240, 0.15);
}

.bg-gradient {
    background: linear-gradient(135deg, #7367F0 0%, #A66FFE 100%);
    border: none;
    position: relative;
    overflow: hidden;
}

.bg-gradient:hover {
    background: linear-gradient(135deg, #5d52d8 0%, #8e56e0 100%);
}

.bg-gradient::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        to bottom right,
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.1) 50%,
        rgba(255, 255, 255, 0) 100%
    );
    transform: rotate(30deg);
    transition: all 0.5s ease;
}

.bg-gradient:hover::after {
    left: 100%;
}

.input-group-text {
    transition: all 0.3s ease;
}

.form-control, .form-select {
    transition: all 0.3s ease;
    border-left: 0 !important;
}

.form-control:focus, .form-select:focus {
    box-shadow: 0 0 0 0.25rem rgba(115, 103, 240, 0.25);
    border-color: #7367F0;
}

.quantity-input {
    font-weight: 600;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-body {
        padding: 1.5rem;
    }
}
</style>
@endsection