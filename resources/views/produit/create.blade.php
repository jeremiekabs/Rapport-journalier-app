@extends('layouts.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <h2 class="h4 fw-bold mb-0 text-center">➕ Ajouter un Nouveau Produit</h2>
                </div>
                
                <div class="card-body p-5">
                    <form action="{{ route('produits.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        
                        <!-- Nom du Produit -->
                        <div class="mb-4">
                            <label for="nom" class="form-label fw-semibold">Nom du produit <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-box-open"></i></span>
                                <input type="text" name="nom" id="nom" class="form-control form-control-lg" required>
                            </div>
                            <div class="invalid-feedback">Veuillez saisir le nom du produit.</div>
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Décrivez le produit..."></textarea>
                        </div>
                        
                        <div class="row">
                            <!-- Prix d'achat -->
                            <div class="col-md-6 mb-4">
                                <label for="prix_achat" class="form-label fw-semibold">Prix d'achat <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">€</span>
                                    <input type="number" name="prix_achat" id="prix_achat" class="form-control" step="0.01" required>
                                </div>
                                <div class="invalid-feedback">Veuillez saisir un prix valide.</div>
                            </div>
                            
                            <!-- Indice -->
                            <div class="col-md-6 mb-4">
                                <label for="indice" class="form-label fw-semibold">Indice <span class="text-danger">*</span></label>
                                <input type="number" name="indice" id="indice" class="form-control" step="0.01" required>
                                <div class="invalid-feedback">Veuillez saisir l'indice.</div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- Stock -->
                            <div class="col-md-6 mb-4">
                                <label for="stock" class="form-label fw-semibold">Stock <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-cubes"></i></span>
                                    <input type="number" name="stock" id="stock" class="form-control" required>
                                </div>
                                <div class="invalid-feedback">Veuillez saisir la quantité en stock.</div>
                            </div>
                            
                            <!-- Catégorie -->
                            <div class="col-md-6 mb-4">
                                <label for="categorie_id" class="form-label fw-semibold">Catégorie <span class="text-danger">*</span></label>
                                <select name="categorie_id" id="categorie_id" class="form-select" required>
                                    @foreach($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Veuillez sélectionner une catégorie.</div>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold py-3">
                                <i class="fas fa-rocket me-2"></i> Enregistrer le Produit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Validation Bootstrap -->
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.08);
    }
    
    .form-control, .form-select {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #764ba2;
        box-shadow: 0 0 0 0.25rem rgba(118, 75, 162, 0.25);
    }
    
    .btn-primary {
        background-color: #764ba2;
        border-color: #764ba2;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #5d3a7e;
        border-color: #5d3a7e;
        transform: translateY(-2px);
    }
</style>
@endsection