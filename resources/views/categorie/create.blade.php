@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold text-center">➕ Ajouter une Catégorie</h2>

    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Nom de la catégorie :</label>
                    <input type="text" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Description :</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100">🚀 Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection
