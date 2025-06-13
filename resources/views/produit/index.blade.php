@extends('layouts.template')

@section('content')
    <div class="container-fluid mt-4">
        <!-- En-tête amélioré -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">🛒 Gestion des Produits</h2>
                <p class="text-muted mb-0">Inventaire et administration des produits</p>
            </div>
            <div class="d-flex gap-2">
                @if (auth()->user()->statut == 1)
                    <a href="{{ route('produits.create') }}" class="btn btn-primary rounded-pill px-4">
                        <i class="ri-add-line me-1"></i> Ajouter un produit
                    </a>
                @else
                    <button class="btn btn-secondary rounded-pill px-4" disabled>
                        <i class="ri-add-line me-1"></i> Ajouter un produit
                    </button>
                @endif

                <a href="{{ route('vente.rupture') }}" class="btn btn-outline-primary rounded-pill px-4">
                    <i class="ri-alarm-warning-line me-1"></i> Produits en rupture
                </a>
            </div>
        </div>

        <!-- Message flash amélioré -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <div class="d-flex align-items-center">
                    <i class="ri-checkbox-circle-fill me-2"></i>
                    <div>{{ session('success') }}</div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Carte principale avec tableau -->
        <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="m-0 fw-bold"><i class="ri-store-2-line me-2"></i>Inventaire des Produits</h5>
            </div>
            <div class="card-body p-0">
                @if ($produits->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4 py-3 text-uppercase small fw-bold">#</th>
                                    <th class="py-3 text-uppercase small fw-bold">Produit</th>
                                    <th class="py-3 text-uppercase small fw-bold">Catégorie</th>
                                    <th class="py-3 text-uppercase small fw-bold">Prix</th>
                                    <th class="py-3 text-uppercase small fw-bold">Stock</th>
                                    <th class="py-3 text-uppercase small fw-bold">Modifié le</th>
                                    <th class="py-3 text-uppercase small fw-bold">Description</th>
                                    <th class="pe-4 py-3 text-uppercase small fw-bold text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr class="border-top">
                                        <td class="ps-4 fw-medium">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                                    <i class="ri-shopping-bag-line text-primary"></i>
                                                </div>
                                                <span>{{ $produit->nom }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border rounded-pill px-3">
                                                {{ $produit->categorie->nom }}
                                            </span>
                                        </td>
                                        <td class="fw-bold text-success">
                                            {{ number_format($produit->prix, 2) }} $
                                        </td>
                                        <td>
                                            <span
                                                class="badge rounded-pill bg-{{ $produit->stock > 0 ? 'success' : 'danger' }}-subtle text-{{ $produit->stock > 0 ? 'success' : 'danger' }} px-3 py-1">
                                                {{ $produit->stock }} unité(s)
                                            </span>
                                        </td>
                                        <td class="fw-bold text-success">
                                            {{ $produit->description }} 
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border rounded-pill px-5">
                                                Créé : {{ $produit->created_at->diffForHumans() }}<br>
                                                Modifié : {{ $produit->updated_at->diffForHumans() }}
                                            </span>
                                        </td>

                                        <td class="pe-4 text-end">
                                            <div class="d-flex justify-content-end gap-2">

                                                @if (auth()->check() && auth()->user()->statut == 1)
                                                    <a href="{{ route('produits.show', $produit->id) }}"
                                                        class="btn btn-sm btn-light rounded-circle" title="Détails">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    <a href="{{ route('produits.edit', $produit->id) }}"
                                                        class="btn btn-sm btn-light rounded-circle" title="Modifier">
                                                        <i class="ri-edit-line"></i>
                                                    </a>

                                                    <form action="{{ route('produits.destroy', $produit->id) }}"
                                                        method="POST" onsubmit="return confirm('Supprimer ce produit ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light rounded-circle"
                                                            title="Supprimer">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <button class="btn btn-sm btn-secondary rounded-circle" title="Voir"
                                                        disabled>
                                                        <i class="ri-eye-line"></i>
                                                    </button>

                                                    <button class="btn btn-sm btn-secondary rounded-circle" title="Modifier"
                                                        disabled>
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <button class="btn btn-sm btn-secondary rounded-circle"
                                                        title="Supprimer" disabled>
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                @endif
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center p-5">
                        <div class="mb-3">
                            <i class="ri-shopping-cart-2-line text-muted" style="font-size: 5rem;"></i>
                        </div>
                        <h5 class="fw-bold text-muted">Aucun produit enregistré</h5>
                        <p class="text-muted">Commencez par ajouter votre premier produit</p>
                        <a href="{{ route('produits.create') }}" class="btn btn-primary rounded-pill px-4">
                            <i class="ri-add-line me-1"></i> Ajouter un produit
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
