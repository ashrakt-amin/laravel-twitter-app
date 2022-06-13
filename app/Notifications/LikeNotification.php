<?php

namespace App\Notifications;

use App\Models\Like;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LikeNotification extends Notification
{
    use Queueable;
    private $like;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Like $like)
    {
        $this->like = $like;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->greeting("Hello"."" .$notifiable->name)
    //                 ->subject('new notification')
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', URL::route('like'))
    //                 ->line('Thank you for using our application!');
    // }


    public function toDatabase($notifiable)
    {
        return [
            'title'  =>"like",
            'body'  => auth()->user()->name ." liked yout tweet",
            'action' =>URL::route('reply.show',$this->like->tweet_id),
            'icon'   =>''
        ];
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
