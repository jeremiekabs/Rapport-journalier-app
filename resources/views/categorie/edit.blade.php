@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center">✏️ Modifier la Catégorie</h2>

    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-bold">Nom de la catégorie :</label>
                    <input type="text" name="nom" class="form-control" value="{{ $categorie->nom }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Description :</label>
                    <textarea name="description" class="form-control" rows="3">{{ $categorie->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-warning w-100">✅ Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
