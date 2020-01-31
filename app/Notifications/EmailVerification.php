<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Crypt;

class EmailVerification extends Notification{

    use Queueable;

    // protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($users_data,$configuration)
    {
        $this->users_data    = $users_data;
        $this->configuration = $configuration;
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
                    ->error()
                    ->subject($this->configuration->name.' Verify email address')
                    ->from($this->configuration->email)
                    ->greeting('Good day!')
                    ->line('Thank you for registering with '.$this->configuration->name.'!.')
                    ->line('Click the button to complete verification.')
                    ->action('Verify email address', URL('verify-registration/'.Crypt::encrypt($this->users_data->email)));
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
