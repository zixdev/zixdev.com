<?php

namespace Zix\Core\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivateYourAccount extends Notification
{
    use Queueable;
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification channels.
     *
     * @param  mixed  $notifiable
     * @return array|string ['mail', 'database', 'slack', 'nexmo']
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the notification message.
     *
     * @return void
     */
    public function message()
    {
        $this->line('The introduction to the notification.')
                ->action('Notification Action', 'https://laravel.com')
                ->line('Thank you for using our application!');
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Todo get The app URL && the activate code
        $url = 'http://localhost:4200/auth/account/activate/'. $this->user->active_code;

        return (new MailMessage)
            ->greeting('Hello, ' . $this->user->username)
            ->line('To get started, click the link below to confirm your account.')
            ->action('Confirm Your Account ', $url)

            ->line('Thank you for using our application!');

    }
}
