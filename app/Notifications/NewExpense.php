<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Expense;

class NewExpense extends Notification
{
    use Queueable;
    private $expense;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Expense $expense)
    {
        $this->expense = $expense;
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
        $url = url('/expenses/'.$this->expense->id);
        
        return (new MailMessage)
                    ->subject('X-Erp New Expense (#'.$this->expense->id.')')
                    ->greeting('Hi!')
                    ->line('New Expense of Rs. '.$this->expense->amount.'(#'.$this->expense->id.') added to system.')
                    ->action('View Expense', $url)
                    ->line('Thank you!');
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
