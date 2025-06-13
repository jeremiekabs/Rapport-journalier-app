<?php

namespace App\Notifications;

use App\Models\Vente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VenteNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $vente;

    public function __construct(Vente $vente)
    {
        $this->vente = $vente;
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
            'created_at' => now(),
        ];
    }
}
