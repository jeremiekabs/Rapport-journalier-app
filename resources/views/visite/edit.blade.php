@extends('layouts.template')

@section('content')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-6">
                                <div class="card-body">
                                    <h2 class="text-center mb-4">✏ Modifier la Visite</h2>
                                    <form id="formEditVisite" method="POST" action="{{ route('visite.update', $visite->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mt-1 g-5">
                                            <!-- Date & Heures -->
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input class="form-control" type="time" name="heure_entree" id="heure_entree" value="{{ $visite->heure_entree }}" />
                                                    <label for="heure_entree">Heure d'entrée</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input class="form-control" type="time" name="heure_sortie" id="heure_sortie" value="{{ $visite->heure_sortie }}" />
                                                    <label for="heure_sortie">Heure de sortie</label>
                                                </div>
                                            </div>

                                            <!-- Informations Personnelles -->
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input class="form-control" type="text" id="nom" name="nom" value="{{ $visite->nom }}" placeholder="Nom" />
                                                    <label for="nom">Nom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input class="form-control" type="text" id="prenom" name="prenom" value="{{ $visite->prenom }}" placeholder="Prénom" />
                                                    <label for="prenom">Prénom</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input class="form-control" type="text" id="qualite_personne" name="qualite_personne" value="{{ $visite->qualite_personne }}" placeholder="Qualité" />
                                                    <label for="qualite_personne">Qualité</label>
                                                </div>
                                            </div>

                                            <!-- Contact -->
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $visite->telephone }}" placeholder="Téléphone" />
                                                    <label for="telephone">Téléphone</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $visite->email }}" placeholder="E-mail" />
                                                    <label for="email">E-mail</label>
                                                </div>
                                            </div>

                                            <!-- Entreprise & Particulier -->
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" class="form-control" id="entreprise" name="entreprise" value="{{ $visite->entreprise }}" placeholder="Entreprise" />
                                                    <label for="entreprise">Entreprise</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" class="form-control" id="particulier" name="particulier" value="{{ $visite->particulier }}" placeholder="Particulier" />
                                                    <label for="particulier">Particulier</label>
                                                </div>
                                            </div>

                                            <!-- Raison de la visite & Produits demandés -->
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <textarea class="form-control" id="raison_visite" name="raison_visite">{{ $visite->raison_visite }}</textarea>
                                                    <label for="raison_visite">Raison de la visite</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" class="form-control" id="produit_service_demande" name="produit_service_demande" value="{{ $visite->produit_service_demande }}" />
                                                    <label for="produit_service_demande">Produit ou Service demandé</label>
                                                </div>
                                            </div>

                                            <!-- Radio Buttons -->
                                            @foreach (['vente_directe', 'visite_site', 'vente'] as $field)
                                                <div class="col-md-6">
                                                    <label class="form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                                                    <div class="form-floating form-floating-outline border p-3 rounded">
                                                        <div class="d-flex gap-3">
                                                            @foreach ($enumValues as $value)
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input" name="{{ $field }}" value="{{ $value }}"
                                                                    {{ $visite->$field == $value ? 'checked' : '' }} required>
                                                                    <label class="form-check-label">{{ $value }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <!-- Commentaires -->
                                            <div class="col-md-12">
                                                <div class="form-floating form-floating-outline">
                                                    <textarea name="commentaires" class="form-control" id="commentaires">{{ $visite->commentaires }}</textarea>
                                                    <label for="commentaires">Commentaire</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <button type="submit" class="btn btn-primary me-3">💾 Enregistrer</button>
                                            <a href="{{ route('visite.index') }}" class="btn btn-secondary">🔙 Retour</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
