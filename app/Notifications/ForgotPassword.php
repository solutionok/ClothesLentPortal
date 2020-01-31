<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ForgotPassword extends Notification{

    use Queueable;

    // protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($users_data,$configuration,$token)
    {
        $this->users_data    = $users_data;
        $this->configuration = $configuration;
        $this->token         = $token;
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
        if ($this->users_data->privilege == 0) {
            $reset_link = URL('/admin/reset-password?token='.$this->token);
        } else {
            $reset_link = URL('reset-password?token='.$this->token);
        }
        return (new MailMessage)
                    ->error()
                    ->subject($this->configuration->name.' Reset Password')
                    ->from($this->configuration->email)
                    ->greeting('Good day!')
                    ->line('Seems you forgot your password.')
                    ->line('Click the button to reset your password.')
                    ->action('Reset Password', $reset_link);
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
