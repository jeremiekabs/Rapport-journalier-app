@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold">📂 Catégories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">➕ Ajouter une catégorie</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="card mt-3">
        <div class="card-body">
            @if($categories->count() > 0)
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $categorie->nom }}</td>
                                <td>{{ $categorie->description ?? 'Aucune description' }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-warning btn-sm">✏️ Modifier</a>
                                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette catégorie ?')">🗑️ Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-muted">❌ Aucune catégorie enregistrée.</p>
            @endif
        </div>
    </div>
</div>
@endsection
