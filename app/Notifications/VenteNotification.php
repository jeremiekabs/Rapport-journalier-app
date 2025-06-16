<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Models\Vente;

class VenteNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $vente;

    public function __construct(Vente $vente)
    {
        // On évite de passer l’objet complet (avec relations) pour ne pas casser la sérialisation
        $this->vente = $vente->only(['id', 'produit_id', 'quantite', 'prix_total']);
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'vente',
            'title' => 'Nouvelle vente enregistrée',
            'icon' => 'ri-checkbox-circle-fill text-success',
            'vente_id' => $this->vente['id'],
            'created_at' => now(),
        ];
    }
}
