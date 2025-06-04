@extends('layouts.template')

@section('content')
<div class="container">
    <h2>{{ $produit->nom }}</h2>
    <p>Description : {{ $produit->description }}</p>
    <p>Prix d'achat : {{ $produit->prix_achat }} FC</p>
    <p>Indice : {{ $produit->indice }}</p>
    <p>Prix de vente : {{ $produit->prix }} FC</p>
    <p>Gain : {{ $produit->gain }} FC</p>
    <p>Stock : {{ $produit->stock }}</p>
    <p>Catégorie : {{ $produit->categorie->nom }}</p>
</div>
@endsection
