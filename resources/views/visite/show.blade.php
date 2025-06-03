@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">📝 Détails de la Visite</h2>

    <div class="row g-4">
        <!-- Section 1 : Informations générales -->
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-primary"><i class="ri-calendar-line"></i> Date de la visite</h5>
                <p class="fw-bold">{{ $visite->date_enr }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-success"><i class="ri-time-line"></i> Heure d'entrée</h5>
                <p class="fw-bold">{{ $visite->heure_entree }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-danger"><i class="ri-time-line"></i> Heure de sortie</h5>
                <p class="fw-bold">{{ $visite->heure_sortie }}</p>
            </div>
        </div>
        
        <!-- Section 2 : Identité du visiteur -->
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-dark"><i class="ri-user-line"></i> Nom et Prénom</h5>
                <p class="fw-bold">{{ $visite->nom }} {{ $visite->prenom }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-secondary"><i class="ri-building-line"></i> Entreprise</h5>
                <p class="fw-bold">{{ $visite->entreprise }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-warning"><i class="ri-phone-line"></i> Téléphone</h5>
                <p class="fw-bold">{{ $visite->telephone }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-info"><i class="ri-mail-line"></i> Email</h5>
                <p class="fw-bold">{{ $visite->email }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-danger"><i class="ri-user-star-line"></i> Qualité de la personne</h5>
                <p class="fw-bold">{{ $visite->qualite_personne }}</p>
            </div>
        </div>

        <!-- Section 3 : Détails de la visite -->
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-info"><i class="ri-shopping-cart-line"></i> Produit/Service demandé</h5>
                <p class="fw-bold">{{ $visite->produit_service_demande }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-success"><i class="ri-check-line"></i> Vente directe</h5>
                <p class="fw-bold">{{ $visite->vente_directe }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-dark"><i class="ri-map-pin-line"></i> Visite site</h5>
                <p class="fw-bold">{{ $visite->visite_site }}</p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow p-4">
                <h5 class="text-warning"><i class="ri-store-line"></i> Vente</h5>
                <p class="fw-bold">{{ $visite->vente }}</p>
            </div>
        </div>

        <!-- Section 4 : Commentaires -->
        <div class="col-12">
            <div class="card shadow p-4">
                <h5 class="text-dark"><i class="ri-chat-3-line"></i> Commentaires</h5>
                <p class="fw-bold">{{ $visite->commentaires }}</p>
            </div>
        </div>
    </div>

    <!-- Bouton Retour -->
    <div class="text-center mt-4">
        <a href="{{ route('visite.index') }}" class="btn btn-secondary">🔙 Retour</a>
    </div>
</div>
@endsection
