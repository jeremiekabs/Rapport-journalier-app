@extends('layouts.template')

@section('content')
<div class="container">
    <h2 class="mb-4">Liste des Produits</h2>

    <div class="row">
        @foreach($produit_all as $produit)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @if($produit->photo)
                <img src="{{ asset($produit->photo) }}" class="card-img-top" alt="{{ $produit->nom }}" style="object-fit: cover; height: 200px;">
                @else
                <img src="{{ asset('default.png') }}" class="card-img-top" alt="Aucune image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $produit->nom }}</h5>
                    <p class="card-text fw-semibold">Prix : ${{ number_format($produit->prix, 2, ',', ' ') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $produit_all->links() }}
    </div>
</div>
@endsection
