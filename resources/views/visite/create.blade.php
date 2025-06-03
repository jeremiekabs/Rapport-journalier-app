@extends('layouts.template')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card mb-6">
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-6">

                                            <div class="button-wrapper">
                                                <label for="upload" class="btn btn-sm btn-primary me-3 mb-4"
                                                    tabindex="0">
                                                    <span class="d-none d-sm-block">Télécharger un fichier</span>
                                                    <i class="icon-base ri ri-upload-2-line d-block d-sm-none"></i>
                                                    <input type="file" id="upload" class="account-file-input" hidden
                                                        accept="image/png, image/jpeg" />
                                                </label>

                                                <div>Autorise que des fichiers PDF</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <form id="formAccountSettings" method="POST" action="{{ route('visite.store') }}">
                                            @csrf
                                            @method('POST')
                                            <div class="row mt-1 g-5">
                                                <div class="col-md-6 form-control-validation">
                                                    <div class="form-floating form-floating-outline">
                                                        <input class="form-control" type="time" name="heure_entree"
                                                            id="heure_entree" value="{{ old('heure_entree') }}" />
                                                        @error('heure_entree')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="heure_entree">Heure d'entrée</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 form-control-validation">
                                                    <div class="form-floating form-floating-outline">
                                                        <input class="form-control" type="time" name="heure_sortie"
                                                            id="heure_sortie" value="{{ old('heure_sortie') }}" />
                                                        @error('heure_sortie')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="heure_sortie">Heure de sortie</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input class="form-control" type="text" id="nom"
                                                            name="nom" placeholder="Entrez le nom"
                                                            value="{{ old('nom') }}" />
                                                        @error('nom')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="nom">Nom</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input class="form-control" type="text" id="prenom"
                                                            name="prenom" placeholder="Entrez prenom"
                                                            value="{{ old('prenom') }}" />
                                                        @error('prenom')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="prenom">Prenom</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group input-group-merge">
                                                        <div class="form-floating form-floating-outline">
                                                            <input type="text" id="qualite_personne"
                                                                name="qualite_personne" class="form-control"
                                                                placeholder="Entrez la qualité de la personne"
                                                                value="{{ old('qualite_personne') }}" />
                                                            @error('qualite_personne')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <label for="qualite_personne">Qualité de la personne</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" class="form-control" id="entreprise"
                                                            name="entreprise" value="{{ old('entreprise') }}"
                                                            placeholder="Nom de l'entreprise" />
                                                        @error('entreprise')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="entreprise">Entreprise ?</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input class="form-control" type="text" id="state"
                                                            name="particulier" value="{{ old('particulier') }}"
                                                            placeholder="Entrez l'information" />
                                                        @error('particulier')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="state">Particulier ?</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" class="form-control" id="telephone"
                                                            name="telephone" value="{{ old('telephone') }}"
                                                            placeholder="Votre numéro" />
                                                        @error('telephone')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="telephone">Telephone</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" value="{{ old('email') }}"
                                                            placeholder="Votre adresse mail" />
                                                        @error('email')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="email">E-mail</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <textarea class="form-control" id="raison_visite" name="raison_visite" />{{ old('raison_visite') }}</textarea>
                                                        @error('raison_visite')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="raison_visite">Raison de la visite</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline">
                                                        <input type="text" class="form-control" id="email"
                                                            name="produit_service_demande" placeholder="Votre numéro"
                                                            value="{{ old('produit_service_demande') }}" />
                                                        @error('produit_service_demande')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="produit_service_demande">Produit ou service
                                                            demandé</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Vente directe</label>
                                                    <div class="form-floating form-floating-outline border p-3 rounded">
                                                        <div class="d-flex gap-3">
                                                            @foreach ($enumValues as $value)
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="vente_directe" value="{{ $value }}"
                                                                        {{ old('vente_directe') == $value ? 'checked' : '' }}
                                                                        required>
                                                                    <label
                                                                        class="form-check-label">{{ $value }}</label>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Visite site</label>
                                                    <div class="form-floating form-floating-outline border p-3 rounded">
                                                        <div class="d-flex gap-3">
                                                            @foreach ($enumValues as $value)
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="visite_site" value="{{ $value }}"
                                                                        {{ old('visite_site') == $value ? 'checked' : '' }}
                                                                        required>
                                                                    <label
                                                                        class="form-check-label">{{ $value }}</label>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Vente</label>
                                                    <div class="form-floating form-floating-outline border p-3 rounded">
                                                        <div class="d-flex gap-3">
                                                            @foreach ($enumValues as $value)
                                                                <div class="form-check">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="vente" value="{{ $value }}"
                                                                        {{ old('vente') == $value ? 'checked' : '' }}
                                                                        required>
                                                                    <label
                                                                        class="form-check-label">{{ $value }}</label>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating form-floating-outline"><br>
                                                        <textarea name="commentaires" class="form-control" id="commentaires" cols="50" rows="10">{{ old('commentaires') }}</textarea>
                                                        @error('commentaires')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        <label for="currency">Commentaire</label>
                                                    </div>
                                                </div>
                                                <style>
                                                    #commentaires {
                                                        height: 100px;
                                                    }
                                                </style>
                                            </div>
                                            <div class="mt-6">
                                                <button type="submit" class="btn btn-primary me-3">Enregistrer</button>
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
