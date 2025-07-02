@extends('layouts.template')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-gradient-primary text-white py-3">
                        <h2 class="h4 fw-bold mb-0 text-center">➕ Ajouter un Nouveau Service</h2>
                    </div>

                    <div class="card-body p-5">
                        <form action="{{ route('service.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('POST')
                            <!-- Nom du Produit -->
                            <div class="mb-4">
                                <label for="nom" class="form-label fw-semibold">Nom du service <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-box-open"></i></span>
                                    <input type="text" name="nom" id="nom" class="form-control form-control-lg"
                                        required>
                                </div>
                                <div class="invalid-feedback">Veuillez saisir le nom du service.</div>
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-semibold">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Décrivez le service..."></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="partenaire">Choix de partenaire</label>
                                <select name="partenaire_id" class="form-select border-start-0 ps-3 shadow-none">
                                    <option value="">Choisir un partenaire</option>
                                    @foreach ($partenaires as $partenaire)
                                        <option value="{{ $partenaire->id }}">
                                            {{ $partenaire->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg fw-bold py-3">
                                    <i class="fas fa-rocket me-2"></i> Enregistrer le service
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
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
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

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
        }

        .form-control:focus,
        .form-select:focus {
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
