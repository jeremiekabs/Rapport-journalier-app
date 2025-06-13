@extends('layouts.template')

@section('content')
    <div class="container my-5">
        <!-- Conteneur principal avec option d'impression -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('vente.index') }}" class="btn btn-outline-primary d-flex align-items-center">
                <i class="bi bi-printer-fill me-2"></i> Voir le paiement
            </a>

            <button onclick="printReceipt()" class="btn btn-outline-primary d-flex align-items-center ms-3">
                <i class="bi bi-printer-fill me-2"></i> Imprimer le reçu
            </button>
        </div>


        <!-- Zone d'impression ciblée - Taille A7 (74mm x 105mm) -->
        <div id="receipt-to-print" class="card border-0 p-0"
            style="width: 74mm; min-height: 105mm; margin: auto; font-family: 'Inter', sans-serif; background: white; position: relative;">

            <!-- En-tête premium -->
            <div class="receipt-header p-3 text-center"
                style="background: linear-gradient(135deg, #f1e835, #d70606); color: white; border-bottom: 2px dashed white;">
                <img src="{{ asset('../assets/img/avatars/smart.png') }}" alt="Logo"
                    style="height: 40px; filter: brightness(0) invert(1); margin-bottom: 5px;">
                <h2 class="fw-bold mb-0" style="font-size: 1.2rem; letter-spacing: -0.5px;">SMARTECH DIGITAL</h2>
                <p class="mb-0" style="font-size: 0.7rem; opacity: 0.9;">Reçu
                    #{{ str_pad($vente->id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>

            <!-- Corps du reçu -->
            <div class="receipt-body p-3" style="font-size: 0.8rem;">
                <!-- Détails transaction -->
                <div class="mb-3">
                    <div class="text-center mb-2" style="color: #d70606; font-weight: 600;">
                        <i class="bi bi-receipt"></i> DÉTAILS DE LA TRANSACTION
                    </div>

                    <table style="width: 100%;">
                        <tr>
                            <td style="padding: 3px 0; width: 40%;">Produit:</td>
                            <td style="padding: 3px 0; font-weight: 500;">{{ $vente->produit->nom }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 3px 0;">Quantité:</td>
                            <td style="padding: 3px 0; font-weight: 500;">{{ $vente->quantite }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 3px 0;">Prix unitaire:</td>
                            <td style="padding: 3px 0; font-weight: 500;">{{ $vente->prix_nego ?? $vente->produit->prix }} $
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 3px 0;">Remise:</td>
                            <td style="padding: 3px 0; font-weight: 500;">
                                {{ $vente->prix_nego ? number_format($vente->produit->prix - $vente->prix_nego, 2) : '0.00' }}
                                $
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Total -->
                <div class="total-section p-2 mb-3 text-center"
                    style="background: #f8f8f8; border: 1px dashed #d70606; border-radius: 3px;">
                    <div style="font-weight: 600;">TOTAL À PAYER</div>
                    <div style="font-size: 1.3rem; font-weight: 700; color: #d70606;">
                        {{ number_format($vente->prix_total, 2) }} $
                    </div>
                </div>

                <!-- Informations -->
                <div class="additional-info mb-3">
                    <div class="text-center mb-1" style="color: #d70606; font-weight: 600;">
                        <i class="bi bi-info-circle"></i> INFORMATIONS
                    </div>

                    <table style="width: 100%;">
                        <tr>
                            <td style="padding: 2px 0; width: 40%;">Date:</td>
                            <td style="padding: 2px 0;">{{ $vente->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 2px 0;">Paiement:</td>
                            <td style="padding: 2px 0;">Espèces</td>
                        </tr>
                        <tr>
                            <td style="padding: 2px 0;">Vendeur:</td>
                            <td style="padding: 2px 0;">{{ Auth::user()->name ?? 'System' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Pied de page -->
            <div class="receipt-footer p-2 text-center"
                style="border-top: 1px dashed #f1e835; font-size: 0.65rem; position: absolute; bottom: 0; width: 100%;">
                <p class="mb-0" style="color: #666;">Ce reçu fait foi de transaction</p>
            </div>
        </div>
    </div>

    <!-- Style d'impression optimisé pour ticket -->
    <style>
        @media print {

            body,
            html {
                margin: 0 !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
                background: white !important;
            }

            body * {
                visibility: hidden;
            }

            #receipt-to-print,
            #receipt-to-print * {
                visibility: visible;
                all: initial;
                font-family: 'Arial Narrow', Arial, sans-serif !important;
            }

            #receipt-to-print {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                margin: 0 !important;
                padding: 0 !important;
                width: 74mm !important;
                height: 105mm !important;
                box-shadow: none !important;
                page-break-after: avoid !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }

            .receipt-header {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                background: linear-gradient(135deg, #f1e835, #d70606) !important;
            }

            /* Masquer le bouton d'impression */
            button {
                display: none !important;
            }
        }

        /* Style pour l'affichage écran */
        @media screen {
            #receipt-to-print {
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
            }
        }
    </style>

    <!-- Script d'impression optimisé -->
    <script>
        function printReceipt() {
            // Créer un clone du reçu pour l'impression
            const receipt = document.getElementById('receipt-to-print').cloneNode(true);

            // Créer une fenêtre d'impression
            const largeur = window.screen.availWidth;
            const hauteur = window.screen.availHeight;

            const printWindow = window.open('', '', `width=${largeur},height=${hauteur},top=0,left=0`);


            // Style minimal pour l'impression
            printWindow.document.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Reçu Smartech Digital</title>
                <style>
                    body {
                        margin: 0;
                        padding: 0;
                        font-family: 'Arial Narrow', Arial, sans-serif;
                        -webkit-print-color-adjust: exact;
                    }
                    @page {
                        size: 74mm 105mm;
                        margin: 3px;
                    }
                </style>
            </head>
            <body>
                ${receipt.outerHTML}
                <script>
                    setTimeout(function() {
                        window.print();
                        window.close();
                    }, 200);
                <\/script>
            </body>
            </html>
        `);

            printWindow.document.close();
        }
    </script>
@endsection
