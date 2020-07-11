<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyListBirthdayUser extends Notification
{
    use Queueable;

    public $email;
    public $data;

    /**
     * Create a new notification instance.
     *
     * @param $email
     * @param $data
     */
    public function __construct($data)
    {
        //$this->email = $email;
        $this->data = $data;
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
     * @param mixed $notifiable
     * @param $data
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable, $data)
    {
        return (new MailMessage)
            ->subject('Listes des anniversaire du jour')
            ->markdown('emails.new_list.user_notification', ['data' => $data]);
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
