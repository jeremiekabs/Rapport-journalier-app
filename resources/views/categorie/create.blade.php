@extends('layouts.template')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <h1 class="fw-bold text-gradient-primary">➕ Ajouter une Nouvelle Catégorie</h1>
                <p class="lead text-muted">Remplissez les détails pour créer une nouvelle catégorie</p>
            </div>

            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h3 class="mb-0 fw-light"><i class="fas fa-tags me-2"></i> Informations de la Catégorie</h3>
                </div>
                
                <div class="card-body p-4 p-lg-5">
                    <form action="{{ route('categories.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="mb-4">
                            <label for="nom" class="form-label fw-bold text-uppercase small text-primary">Nom de la catégorie</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-heading text-primary"></i></span>
                                <input type="text" name="nom" id="nom" class="form-control form-control-lg border-start-0" placeholder="Ex: Électronique, Mode, etc." required>
                            </div>
                            <div class="invalid-feedback">
                                Veuillez entrer un nom de catégorie valide.
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold text-uppercase small text-primary">Description</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light align-items-start pt-2"><i class="fas fa-align-left text-primary"></i></span>
                                <textarea name="description" id="description" class="form-control border-start-0" rows="4" placeholder="Décrivez cette catégorie..."></textarea>
                            </div>
                        </div>
                        
                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                                <i class="fas fa-rocket me-2"></i> Enregistrer la Catégorie
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light py-3 text-center">
                    <p class="small mb-0 text-muted">Tous les champs marqués d'un <span class="text-danger">*</span> sont obligatoires</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-gradient-primary {
        background: linear-gradient(to right, #4e73df, #224abe);
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
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    .input-group-text {
        border-right: none;
    }
    
    .border-start-0 {
        border-left: none !important;
    }
</style>

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
@endsection