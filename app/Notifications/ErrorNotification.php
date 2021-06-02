<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class ErrorNotification extends Notification
{
    use Queueable;

    public $exception_array;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($exception_array)
    {
        $this->exception_array = $exception_array;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'slack'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toSlack($notifiable)
    {
        $exception_array = $this->exception_array;
        
        return (new SlackMessage)
                ->to('#xerp-error-logs')
                ->content('*Exception Occurred _'.date('d/m/Y H:i:s').'_*')
                ->attachment(function ($attachment) use ($exception_array) {
                    $attachment->title('Exception Data')
                               ->fields($exception_array);
                });
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
