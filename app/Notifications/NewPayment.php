<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Payment;

class NewPayment extends Notification
{
    use Queueable;
    private $payment;
    private $expense_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Payment $payment,$expense_id)
    {
        $this->payment = $payment;
        $this->expense_id = $expense_id;
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
        $url = url('/payments/'.$this->payment->id);
        
        return (new MailMessage)
                    ->subject('X-Erp Payment Done for #'.$this->expense_id)
                    ->greeting('Hi! '.$notifiable->name)
                    ->line('Payment of Rs. '.$this->payment->amount.' done for Expense id #'.$this->expense_id)
                    ->action('View Payment Details', $url)
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
