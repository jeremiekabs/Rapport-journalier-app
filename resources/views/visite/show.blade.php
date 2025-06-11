@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <!-- En-tête avec icône et titre stylisé -->
    <div class="d-flex justify-content-center align-items-center mb-5">
        <div class="me-3">
            <div class="icon-circle bg-primary text-white">
                <i class="ri-clipboard-line fs-3"></i>
            </div>
        </div>
        <h1 class="text-center mb-0 fw-bold text-gradient">Détails de la Visite</h1>
    </div>

    <!-- Carte principale avec onglets -->
    <div class="card shadow-lg border-0 overflow-hidden mb-5">
        <div class="card-header bg-white p-0">
            <ul class="nav nav-tabs nav-justified" id="visiteTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-tab-pane" type="button" role="tab">
                        <i class="ri-information-line me-2"></i>Informations
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="visiteur-tab" data-bs-toggle="tab" data-bs-target="#visiteur-tab-pane" type="button" role="tab">
                        <i class="ri-user-line me-2"></i>Visiteur
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab">
                        <i class="ri-file-list-line me-2"></i>Détails
                    </button>
                </li>
            </ul>
        </div>
        
        <div class="card-body p-4">
            <div class="tab-content" id="visiteTabsContent">
                <!-- Onglet Informations Générales -->
                <div class="tab-pane fade show active" id="info-tab-pane" role="tabpanel" aria-labelledby="info-tab">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-primary-light">
                                    <i class="ri-calendar-2-line text-primary"></i>
                                </div>
                                <div>
                                    <h6>Date de la visite</h6>
                                    <p class="fw-bold text-dark">{{ $visite->date_enr }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-success-light">
                                    <i class="ri-time-line text-success"></i>
                                </div>
                                <div>
                                    <h6>Heure d'entrée</h6>
                                    <p class="fw-bold text-dark">{{ $visite->heure_entree }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-danger-light">
                                    <i class="ri-time-line text-danger"></i>
                                </div>
                                <div>
                                    <h6>Heure de sortie</h6>
                                    <p class="fw-bold text-dark">{{ $visite->heure_sortie }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-danger-light">
                                    <i class="ri-user-3-line text-info"></i>
                                </div>
                                <div>
                                    <h6>Enregistrée par </h6>
                                    <p class="fw-bold text-dark">{{ $visite->user->name .' '.$visite->user->firstname }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Onglet Informations Visiteur -->
                <div class="tab-pane fade" id="visiteur-tab-pane" role="tabpanel" aria-labelledby="visiteur-tab">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-info-light">
                                    <i class="ri-user-3-line text-info"></i>
                                </div>
                                <div>
                                    <h6>Nom et Prénom</h6>
                                    <p class="fw-bold text-dark">{{ $visite->nom }} {{ $visite->prenom }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-warning-light">
                                    <i class="ri-building-2-line text-warning"></i>
                                </div>
                                <div>
                                    <h6>Entreprise</h6>
                                    <p class="fw-bold text-dark">{{ $visite->entreprise }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-secondary-light">
                                    <i class="ri-phone-line text-secondary"></i>
                                </div>
                                <div>
                                    <h6>Téléphone</h6>
                                    <p class="fw-bold text-dark">{{ $visite->telephone }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-purple-light">
                                    <i class="ri-mail-line text-purple"></i>
                                </div>
                                <div>
                                    <h6>Email</h6>
                                    <p class="fw-bold text-dark">{{ $visite->email }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-orange-light">
                                    <i class="ri-user-star-line text-orange"></i>
                                </div>
                                <div>
                                    <h6>Qualité de la personne</h6>
                                    <p class="fw-bold text-dark">{{ $visite->qualite_personne }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-orange-light">
                                    <i class="ri-user-star-line text-orange"></i>
                                </div>
                                <div>
                                    <h6>Particulier </h6>
                                    <p class="fw-bold text-dark">{{ $visite->particulier }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Onglet Détails Visite -->
                <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-teal-light">
                                    <i class="ri-shopping-basket-line text-teal"></i>
                                </div>
                                <div>
                                    <h6>Produit/Service demandé</h6>
                                    <p class="fw-bold text-dark">{{ $visite->produit_service_demande }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-pink-light">
                                    <i class="ri-checkbox-circle-line text-pink"></i>
                                </div>
                                <div>
                                    <h6>Vente directe</h6>
                                    <p class="fw-bold text-dark">{{ $visite->vente_directe }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-indigo-light">
                                    <i class="ri-map-pin-2-line text-indigo"></i>
                                </div>
                                <div>
                                    <h6>Visite site</h6>
                                    <p class="fw-bold text-dark">{{ $visite->visite_site }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="info-card">
                                <div class="info-icon bg-brown-light">
                                    <i class="ri-store-2-line text-brown"></i>
                                </div>
                                <div>
                                    <h6>Vente</h6>
                                    <p class="fw-bold text-dark">{{ $visite->vente }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="info-card">
                                <div class="info-icon bg-blue-light">
                                    <i class="ri-chat-quote-line text-blue"></i>
                                </div>
                                <div class="w-100">
                                    <h6>Commentaires</h6>
                                    <div class="comment-box">
                                        <p class="fw-bold text-dark">{{ $visite->commentaires }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Boutons d'action -->
    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('visite.index') }}" class="btn btn-outline-secondary">
            <i class="ri-arrow-left-line me-2"></i> Retour à la liste
        </a>
    </div>
</div>

<style>
    
    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .text-gradient {
        background: linear-gradient(45deg, #3a7bd5, #00d2ff);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .info-card {
        display: flex;
        align-items: center;
        padding: 1.25rem;
        border-radius: 12px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }
    
    .info-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .comment-box {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 1rem;
        border-left: 4px solid #3a7bd5;
    }
    
    /* Couleurs personnalisées */
    .bg-primary-light { background-color: rgba(58, 123, 213, 0.1); }
    .bg-success-light { background-color: rgba(40, 167, 69, 0.1); }
    .bg-danger-light { background-color: rgba(220, 53, 69, 0.1); }
    .bg-info-light { background-color: rgba(23, 162, 184, 0.1); }
    .bg-warning-light { background-color: rgba(255, 193, 7, 0.1); }
    .bg-secondary-light { background-color: rgba(108, 117, 125, 0.1); }
    .bg-purple-light { background-color: rgba(111, 66, 193, 0.1); }
    .bg-orange-light { background-color: rgba(253, 126, 20, 0.1); }
    .bg-teal-light { background-color: rgba(32, 201, 151, 0.1); }
    .bg-pink-light { background-color: rgba(232, 62, 140, 0.1); }
    .bg-indigo-light { background-color: rgba(102, 16, 242, 0.1); }
    .bg-brown-light { background-color: rgba(141, 110, 99, 0.1); }
    .bg-blue-light { background-color: rgba(13, 110, 253, 0.1); }
    
    .text-purple { color: #6f42c1; }
    .text-orange { color: #fd7e14; }
    .text-teal { color: #20c997; }
    .text-pink { color: #e83e8c; }
    .text-indigo { color: #6610f2; }
    .text-brown { color: #8d6e63; }
    .text-blue { color: #0d6efd; }
    
    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 1rem 1.5rem;
    }
    
    .nav-tabs .nav-link.active {
        color: #3a7bd5;
        background-color: transparent;
        border-bottom: 3px solid #3a7bd5;
    }
</style>
@endsection