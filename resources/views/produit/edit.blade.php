@extends('layouts.template')

@section('content')
    <div class="container product-edit-container">
        <div class="edit-product-card">
            <!-- Header with animated icon -->
            <div class="edit-header">
                <div class="edit-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M6.94 14.036c-.233.624-.43 1.2-.606 1.783.96-.697 2.101-1.139 3.418-1.304 2.513-.314 4.746-1.973 5.876-4.058l-1.456-1.455 1.413-1.415 1-1.001c.43-.43.915-1.224 1.428-2.368-5.593.867-9.018 4.292-11.074 9.818zM17 9.001L18 10c-1 3-4 6-8 6.5-2.669.334-4.336 2.167-5.002 5.5H3C4 16 6 2 21 2c-1 2.997-1.998 4.996-2.997 5.997L17 9.001z"
                            fill="rgba(255,193,7,1)" />
                    </svg>
                </div>
                <h2 class="edit-title">Éditer <span class="product-name-highlight">{{ $produit->nom }}</span></h2>
                <p class="edit-subtitle">Modifiez les détails de votre produit</p>
            </div>

            <form action="{{ route('produits.update', $produit->id) }}" method="POST" class="edit-product-form">
                @csrf
                @method('PUT')

                <!-- Form Grid -->
                <div class="form-grid">
                    <!-- Left Column -->
                    <div class="form-column">
                        <!-- Nom du Produit -->
                        <div class="form-floating floating-label-group">
                            <input type="text" name="nom" id="nom" class="form-control floating-input"
                                value="{{ $produit->nom }}" required>
                            <label class="floating-label">Nom du Produit</label>
                        </div>

                        <!-- Prix d'Achat -->
                        <div class="form-floating floating-label-group">
                            <input type="number" name="prix_achat" id="prix_achat" class="form-control floating-input"
                                step="0.01" value="{{ $produit->prix_achat }}" required>
                            <label class="floating-label">Prix d'Achat</label>
                            <div class="currency-indicator">$</div>
                        </div>

                        <!-- Indice -->
                        <div class="form-floating floating-label-group">
                            <input type="text" name="indice" id="indice" class="form-control floating-input"
                                value="{{ $produit->indice }}" required>
                            <label class="floating-label">Indice</label>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="form-column">
                        <!-- Gain -->
                        <div class="form-floating floating-label-group">
                            <input type="number" name="gain" id="gain" class="form-control floating-input"
                                step="0.01" value="{{ $produit->gain }}" required>
                            <label class="floating-label">Gain</label>
                        </div>

                        <!-- Stock -->
                        <div class="form-floating floating-label-group">
                            <input type="number" name="stock" id="stock" class="form-control floating-input"
                                value="{{ $produit->stock }}" required>
                            <label class="floating-label">Quantité en Stock</label>
                            <div class="unit-indicator">unités</div>
                        </div>

                        <!-- Catégorie -->
                        <div class="form-floating floating-label-group">
                            <select name="categorie_id" id="categorie_id" class="form-select floating-select">
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}"
                                        {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                            <label class="floating-label">Catégorie</label>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="form-floating floating-label-group description-group">
                    <textarea name="description" id="description" class="form-control floating-textarea">{{ $produit->description }}</textarea>
                    <label class="floating-label">Description du Produit</label>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('produits.index') }}" type="button" class="btn btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Annuler
                    </a>
                    <button type="submit" class="btn btn-save">
                        <i class="fas fa-save me-2"></i> Enregistrer
                    </button>
                </div>
            </form>

        </div>
    </div>

    <style>
        .product-edit-container {
            max-width: 900px;
            padding: 2rem;
            margin: 0 auto;
        }

        .edit-product-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            padding: 2.5rem;
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .edit-product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #FFC107, #FF9800, #FF5722);
        }

        .edit-header {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .edit-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            background: linear-gradient(135deg, rgba(255, 193, 7, 0.1) 0%, rgba(255, 193, 7, 0.2) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        .edit-title {
            font-weight: 800;
            color: #2c3e50;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .product-name-highlight {
            color: #FF9800;
            position: relative;
            display: inline-block;
        }

        .product-name-highlight::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 0;
            width: 100%;
            height: 8px;
            background: rgba(255, 152, 0, 0.3);
            z-index: -1;
            border-radius: 4px;
        }

        .edit-subtitle {
            color: #7f8c8d;
            font-size: 1.1rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        .floating-label-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .floating-input,
        .floating-select,
        .floating-textarea {
            font-size: 1rem;
            padding: 1.5rem 1rem 0.5rem 3rem;
            height: auto;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        .floating-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .floating-input:focus,
        .floating-select:focus,
        .floating-textarea:focus {
            border-color: #FFC107;
            box-shadow: 0 0 0 3px rgba(255, 193, 7, 0.2);
            background-color: white;
            outline: none;
        }

        .floating-label {
            position: absolute;
            top: 1.5rem;
            left: 3rem;
            color: #95a5a6;
            transition: all 0.2s ease;
            pointer-events: none;
            font-size: 0.9rem;
        }

        .floating-input:focus~.floating-label,
        .floating-input:not(:placeholder-shown)~.floating-label,
        .floating-select:focus~.floating-label,
        .floating-select:not([value=""]):valid~.floating-label {
            top: 0.4rem;
            left: 3rem;
            font-size: 0.7rem;
            color: #FF9800;
            font-weight: 600;
        }

        .currency-indicator,
        .unit-indicator {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #95a5a6;
            font-size: 0.9rem;
        }

        .description-group {
            grid-column: span 2;
        }

        @media (max-width: 768px) {
            .description-group {
                grid-column: span 1;
            }
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-back {
            background: white;
            color: #2c3e50;
            border: 2px solid #e0e0e0;
        }

        .btn-back:hover {
            background: #f5f5f5;
            border-color: #bdc3c7;
        }

        .btn-save {
            background: linear-gradient(135deg, #FFC107, #FF9800);
            color: white;
            border: none;
            box-shadow: 0 4px 6px rgba(255, 152, 0, 0.2);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(255, 152, 0, 0.3);
        }

        /* Animations */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .edit-product-form {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        // Add dynamic class when input has value
        document.querySelectorAll('.floating-input, .floating-select, .floating-textarea').forEach(input => {
            if (input.value || input.options && input.options[input.selectedIndex] && input.options[input
                    .selectedIndex].value) {
                input.nextElementSibling.classList.add('active');
            }

            input.addEventListener('input', function() {
                if (this.value || (this.options && this.options[this.selectedIndex] && this.options[this
                        .selectedIndex].value)) {
                    this.nextElementSibling.classList.add('active');
                } else {
                    this.nextElementSibling.classList.remove('active');
                }
            });
        });

        // Add animation to save button on hover
        const saveBtn = document.querySelector('.btn-save');
        saveBtn.addEventListener('mouseenter', () => {
            saveBtn.innerHTML = '<i class="fas fa-save me-2"></i> Sauvegarder les modifications';
        });
        saveBtn.addEventListener('mouseleave', () => {
            saveBtn.innerHTML = '<i class="fas fa-save me-2"></i> Enregistrer';
        });
    </script>
@endsection
