<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class RetourLivreRetardNotification extends Notification
{
    use Queueable;
    protected $livreTitre;

    /**
     * Create a new notification instance.
     */
    public function __construct($livreTitre)
    {
        $this->livreTitre = $livreTitre;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database']; // Enregistre dans la base de données
    }

    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'message' => 'Vous êtes en retard pour rendre le livre : ' . $this->livreTitre,
            'user_id' => $notifiable->id,
        ]);
    }

    /**
     * Get the mail representation of the notification.
     */
    /* public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    } */

    /**
     * Get the array representation of the notification.
     *
     * /* @return array<string, mixed>
     */
    /* public function toArray(object $notifiable): array
    {
        return [
          
        ];
    }
 */}
