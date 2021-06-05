<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class ErrorParseNotification extends Notification
{
    use Queueable;

    private $title;
    private $errorMessage;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $title, string $errorMessage)
    {
        $this->title = $title;
        $this->errorMessage = $errorMessage;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        $message = $this->title . "\n\n" . $this->errorMessage;
        return TelegramMessage::create()
            ->to((string) env('TELEGRAM_ERROR_LOG'))
            ->content($message);
    }
}
