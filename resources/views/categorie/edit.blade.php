@extends('layouts.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <h1 class="fw-bold text-gradient-warning">
                    <i class="fas fa-edit me-2"></i> Modifier la Catégorie
                </h1>
                <p class="lead text-muted">Mettez à jour les informations de la catégorie</p>
            </div>

            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header bg-warning text-white py-3">
                    <h3 class="mb-0 fw-light"><i class="fas fa-tag me-2"></i> Édition de Catégorie</h3>
                </div>
                
                <div class="card-body p-4 p-lg-5">
                    <form action="{{ route('categories.update', $categorie->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="nom" class="form-label fw-bold text-uppercase small text-warning">Nom de la catégorie</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-heading text-warning"></i></span>
                                <input type="text" name="nom" id="nom" class="form-control form-control-lg border-start-0" 
                                       value="{{ $categorie->nom }}" placeholder="Ex: Électronique, Mode, etc." required>
                            </div>
                            <div class="invalid-feedback">
                                Veuillez entrer un nom de catégorie valide.
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold text-uppercase small text-warning">Description</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light align-items-start pt-2"><i class="fas fa-align-left text-warning"></i></span>
                                <textarea name="description" id="description" class="form-control border-start-0" 
                                          rows="4" placeholder="Décrivez cette catégorie...">{{ $categorie->description }}</textarea>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-3 d-md-flex justify-content-md-end mt-5">
                            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill me-md-2">
                                <i class="fas fa-times me-2"></i> Annuler
                            </a>
                            <button type="submit" class="btn btn-warning btn-lg rounded-pill shadow-sm">
                                <i class="fas fa-check-circle me-2"></i> Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6 small text-muted">
                            <i class="fas fa-info-circle me-1"></i> Dernière modification: {{ $categorie->updated_at->format('d/m/Y H:i') }}
                        </div>
                        <div class="col-md-6 text-md-end">
                            <span class="badge bg-warning text-dark">
                                <i class="fas fa-id-card me-1"></i> ID: {{ $categorie->id }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-gradient-warning {
        background: linear-gradient(to right, #f6c23e, #dda20a);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        display: inline-block;
    }
    
    .card {
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
    }
    
    .form-control, .form-select {
        border: 1px solid #e0e0e0;
        padding: 0.75rem 1rem;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #f6c23e;
        box-shadow: 0 0 0 0.25rem rgba(246, 194, 62, 0.25);
    }
    
    .input-group-text {
        border-right: none;
    }
    
    .border-start-0 {
        border-left: none !important;
    }
    
    .btn-warning {
        background-color: #f6c23e;
        border-color: #f6c23e;
        color: #000;
    }
    
    .btn-warning:hover {
        background-color: #dda20a;
        border-color: #dda20a;
        color: #000;
    }
</style>

<script>
// Form validation script
(function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')

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
@endsection