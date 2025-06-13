@extends('layouts.template')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Premium Header -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card premium-header">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                            <h4 class="card-title mb-1 text-primary">Formulaire de Visite</h4>
                                            <p class="text-gray mb-0">Profitez de fonctionnalités avancées et d'une meilleure expérience</p>
                                        </div>
                                        <span class="badge bg-warning"><a href="{{ route('visite.index')}}">Voir les visites</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-6 premium-card">
                                    <!-- Account -->
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Détails de la visite</h5>
                                    </div>
                                    
                                    
                                    <div class="card-body pt-0">
                                        <form id="formAccountSettings" method="POST" action="{{ route('visite.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('POST')
                                            
                                            <!-- Section Informations de base -->
                                            <div class="section-header mb-4">
                                                <h6 class="section-title">1. Informations Temporelles</h6>
                                                <div class="section-divider"></div>
                                            </div>
                                            
                                            <div class="row mt-1 g-4">
                                                <div class="col-md-6 form-control-validation">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <input class="form-control" type="time" name="heure_entree"
                                                            id="heure_entree" value="{{ old('heure_entree') }}" />
                                                        <label for="heure_entree">Heure d'entrée</label>
                                                        <i class="fas fa-calendar-alt input-icon"></i>
                                                        @error('heure_entree')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-control-validation">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <input class="form-control" type="time" name="heure_sortie"
                                                            id="date_heure_sortie" value="{{ old('heure_sortie') }}" />
                                                        <label for="heure_sortie">Date et Heure de sortie</label>
                                                        <i class="fas fa-calendar-alt input-icon"></i>
                                                        @error('heure_sortie')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Section Informations Personnelles -->
                                            <div class="section-header mb-4 mt-5">
                                                <h6 class="section-title">2. Informations Personnelles</h6>
                                                <div class="section-divider"></div>
                                            </div>
                                            
                                            <div class="row g-4">
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <input class="form-control" type="text" id="nom"
                                                            name="nom" placeholder="Entrez le nom"
                                                            value="{{ old('nom') }}" />
                                                        <label for="nom">Nom</label>
                                                        <i class="fas fa-user input-icon"></i>
                                                        @error('nom')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <input class="form-control" type="text" id="prenom"
                                                            name="prenom" placeholder="Entrez prenom"
                                                            value="{{ old('prenom') }}" />
                                                        <label for="prenom">Prénom</label>
                                                        <i class="fas fa-user input-icon"></i>
                                                        @error('prenom')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <input type="text" class="form-control" id="telephone"
                                                            name="telephone" value="{{ old('telephone') }}"
                                                            placeholder="Votre numéro" />
                                                        <label for="telephone">Téléphone</label>
                                                        <i class="fas fa-phone input-icon"></i>
                                                        @error('telephone')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" value="{{ old('email') }}"
                                                            placeholder="Votre adresse mail" />
                                                        <label for="email">E-mail</label>
                                                        <i class="fas fa-envelope input-icon"></i>
                                                        @error('email')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <select class="form-select" id="qualite_personne" name="qualite_personne">
                                                            <option value="">Sélectionnez une qualité</option>
                                                            <option value="Client" {{ old('qualite_personne') == 'Client' ? 'selected' : '' }}>Client</option>
                                                            <option value="Fournisseur" {{ old('qualite_personne') == 'Fournisseur' ? 'selected' : '' }}>Fournisseur</option>
                                                            <option value="Partenaire" {{ old('qualite_personne') == 'Partenaire' ? 'selected' : '' }}>Partenaire</option>
                                                            <option value="Visiteur" {{ old('qualite_personne') == 'Visiteur' ? 'selected' : '' }}>Visiteur</option>
                                                            <option value="Autre" {{ old('qualite_personne') == 'Autre' ? 'selected' : '' }}>Autre</option>
                                                        </select>
                                                        <label for="qualite_personne">Qualité de la personne</label>
                                                        <i class="fas fa-briefcase input-icon"></i>
                                                        @error('qualite_personne')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <input type="text" class="form-control" id="entreprise"
                                                            name="entreprise" value="{{ old('entreprise') }}"
                                                            placeholder="Nom de l'entreprise" />
                                                        <label for="entreprise">Entreprise</label>
                                                        <i class="fas fa-building input-icon"></i>
                                                        @error('entreprise')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Section Détails de la Visite -->
                                            <div class="section-header mb-4 mt-5">
                                                <h6 class="section-title">3. Détails de la Visite</h6>
                                                <div class="section-divider"></div>
                                            </div>
                                            
                                            <div class="row g-4">
                                                <div class="col-md-12">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <textarea class="form-control" id="raison_visite" name="raison_visite" placeholder="Décrivez la raison de la visite">{{ old('raison_visite') }}</textarea>
                                                        <label for="raison_visite">Raison de la visite</label>
                                                        <i class="fas fa-question-circle input-icon"></i>
                                                        @error('raison_visite')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <input type="text" class="form-control" id="produit_service_demande" 
                                                            name="produit_service_demande" placeholder="Produit/service demandé"
                                                            value="{{ old('produit_service_demande') }}" />
                                                        <label for="produit_service_demande">Produit ou service demandé</label>
                                                        <i class="fas fa-box-open input-icon"></i>
                                                        @error('produit_service_demande')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                            <!-- Section Options -->
                                            <div class="section-header mb-4 mt-5">
                                                <h6 class="section-title">4. Options</h6>
                                                <div class="section-divider"></div>
                                            </div>
                                            
                                            <div class="row g-4">
                                                <div class="col-md-4">
                                                    <label class="form-label premium-label">Vente directe</label>
                                                    <div class="form-floating form-floating-outline border p-3 rounded premium-radio-group">
                                                        <div class="d-flex gap-3">
                                                            @foreach ($enumValues as $value)
                                                                <div class="form-check premium-radio">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="vente_directe" value="{{ $value }}"
                                                                        {{ old('vente_directe') == $value ? 'checked' : '' }}
                                                                        required id="vente_directe_{{ $value }}">
                                                                    <label class="form-check-label" for="vente_directe_{{ $value }}">
                                                                        {{ $value }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label premium-label">Visite site</label>
                                                    <div class="form-floating form-floating-outline border p-3 rounded premium-radio-group">
                                                        <div class="d-flex gap-3">
                                                            @foreach ($enumValues as $value)
                                                                <div class="form-check premium-radio">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="visite_site" value="{{ $value }}"
                                                                        {{ old('visite_site') == $value ? 'checked' : '' }}
                                                                        required id="visite_site_{{ $value }}">
                                                                    <label class="form-check-label" for="visite_site_{{ $value }}">
                                                                        {{ $value }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label premium-label">Vente</label>
                                                    <div class="form-floating form-floating-outline border p-3 rounded premium-radio-group">
                                                        <div class="d-flex gap-3">
                                                            @foreach ($enumValues as $value)
                                                                <div class="form-check premium-radio">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="vente" value="{{ $value }}"
                                                                        {{ old('vente') == $value ? 'checked' : '' }}
                                                                        required id="vente_{{ $value }}">
                                                                    <label class="form-check-label" for="vente_{{ $value }}">
                                                                        {{ $value }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            
                                            <div class="row g-4">
                                                <div class="col-md-12">
                                                    <div class="form-floating form-floating-outline premium-input">
                                                        <textarea name="commentaires" class="form-control" id="commentaires" placeholder="Ajoutez des commentaires ici">{{ old('commentaires') }}</textarea>
                                                        <label for="commentaires">Commentaires</label>
                                                        <i class="fas fa-comment-dots input-icon"></i>
                                                        @error('commentaires')
                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-5 d-flex justify-content-around">
                                                <div>
                                                    <button type="reset" class="btn btn-outline-danger me-3">
                                                        <i class="fas fa-eraser me-2"></i>Effacer
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-paper-plane me-2"></i>Soumettre la visite
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection

@section('styles')
<style>
    /* Styles Premium */
    .premium-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
    }
    
    .premium-card {
        border: none;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }
    
    .premium-card .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        padding: 1.5rem;
    }
    
    .premium-badge {
        background-color: #fff8e1;
        color: #ffab00;
        padding: 0.35rem 0.75rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .btn-premium {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-premium:hover {
        background: linear-gradient(135deg, #5a6fd1 0%, #6a4199 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .premium-upload-wrapper {
        border: 2px dashed #e0e0e0;
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
        background-color: #f9f9f9;
        width: 100%;
    }
    
    .premium-upload-wrapper:hover {
        border-color: #667eea;
        background-color: #f0f4ff;
    }
    
    .section-header {
        position: relative;
    }
    
    .section-title {
        font-weight: 600;
        color: #667eea;
        position: relative;
        display: inline-block;
        padding-bottom: 5px;
    }
    
    .section-divider {
        height: 2px;
        background: linear-gradient(90deg, #667eea 0%, transparent 100%);
        margin-top: 5px;
    }
    
    .premium-input {
        position: relative;
    }
    
    .premium-input .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #667eea;
    }
    
    .premium-radio-group {
        background-color: #f9f9f9;
        transition: all 0.3s ease;
    }
    
    .premium-radio-group:hover {
        border-color: #667eea;
    }
    
    .premium-radio .form-check-input {
        border: 2px solid #667eea;
    }
    
    .premium-radio .form-check-input:checked {
        background-color: #667eea;
    }
    
    .premium-label {
        font-weight: 600;
        color: #495057;
    }
    
    .premium-attachment-card {
        border: 1px dashed #e0e0e0;
        background-color: #f9f9f9;
    }
    
    .dropzone {
        border: 2px dashed #dee2e6;
        border-radius: 5px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .dropzone:hover {
        border-color: #667eea;
        background-color: #f0f4ff;
    }
    
    #commentaires {
        min-height: 120px;
    }
    
    /* Animation pour les champs requis */
    .form-control:required:not(:placeholder-shown):valid {
        border-color: #28a745;
    }
    
    .form-control:required:not(:placeholder-shown):invalid {
        border-color: #dc3545;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/dropzone@5.9.2/dist/min/dropzone.min.js"></script>
    
@endsection