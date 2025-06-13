<?php

namespace App\Notifications;

use App\Models\Visite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VisiteNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $visite;

    public function __construct(Visite $visite)
    {
        $this->visite = $visite;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'type' => 'visite',
            'title' => 'Nouveau visiteur',
            'icon' => 'ri-user-follow-fill text-info',
            'created_at' => now(),
        ];
    }
}
