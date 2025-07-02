@extends('layouts.template')

@section('content')
<div class="container-fluid mt-4">
    <!-- En-tête amélioré -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">📂 Gestion des services</h2>
            <p class="text-muted mb-0">Liste et administration des services disponibles</p>
        </div>
        <a href="{{ route('service.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="ri-add-line me-1"></i> Ajouter un service
        </a>
    </div>

    <!-- Message flash amélioré -->
    @if(session('success'))
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
            <h5 class="m-0 fw-bold"><i class="ri-list-check-2 me-2"></i>Liste des services</h5>
        </div>
        <div class="card-body p-0">
            @if($services->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4 py-3 text-uppercase small fw-bold">#</th>
                                <th class="py-3 text-uppercase small fw-bold">Nom</th>
                                <th class="py-3 text-uppercase small fw-bold">Description</th>
                                <th class="py-3 text-uppercase small fw-bold">Partenaire</th>
                                <th class="pe-4 py-3 text-uppercase small fw-bold text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr class="border-top">
                                    <td class="ps-4 fw-medium">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                                <i class="ri-folder-line text-primary"></i>
                                            </div>
                                            <span>{{ $service->nom }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ $service->description ?? 'Aucune description' }}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ $service->partenaire->nom }}</span>
                                    </td>
                                    <td class="pe-4 text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="{{ route('service.edit', $service->id) }}" 
                                               class="btn btn-sm btn-light rounded-pill px-3"
                                               title="Modifier">
                                               <i class="ri-edit-line me-1"></i> Modifier
                                            </a>
                                            <form action="{{ route('service.destroy', $service->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Supprimer ce service ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-light rounded-pill px-3"
                                                        title="Supprimer">
                                                        <i class="ri-delete-bin-line me-1"></i> Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Affichage de {{ $services->firstItem() }} à {{ $services->lastItem() }} sur {{ $services->total() }} entrées
                            </div>
                            <div>
                                {{ $services->appends(request()->query())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center p-5">
                    <div class="mb-3">
                        <i class="ri-folder-open-line text-muted" style="font-size: 5rem;"></i>
                    </div>
                    <h5 class="fw-bold text-muted">Aucun service enregistré</h5>
                    <p class="text-muted">Commencez par ajouter votre premier service"</p>
                    <a href="{{ route('service.create') }}" class="btn btn-primary rounded-pill px-4">
                        <i class="ri-add-line me-1"></i> Ajouter un service
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection