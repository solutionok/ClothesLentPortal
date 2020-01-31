<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Crypt;

class RegistrationVerificationCodeSend extends Notification{

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
        return true;
        return (new MailMessage)
                    ->error()
                    ->subject($this->configuration->name.' Registration')
                    ->from($this->configuration->email)
                    ->greeting('Good day!')
                    ->line('Thank you for registering with '.$this->configuration->name.'!.')
                    ->line('Your verification code are '.$this->users_data->verification_code.'. please verify to access your account.');
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
