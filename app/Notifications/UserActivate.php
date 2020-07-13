<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserActivate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Activation du compte par les administrateurs de la plateforme des Anciens de l’INE-ENEAM!')
            ->greeting(sprintf('Hi, %s', $this->user->name))
            ->line('Vous aviez une nouvelle inscription en attente d\'activation. Bien vouloir activer son compte pour pour lui permettre d\'accéder l\'espace des membres.')
            ->action('Activation', route('activate', [$this->user->activationUser->token]))
            ->line('Merci d\'utiliser notre Plateforme!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
