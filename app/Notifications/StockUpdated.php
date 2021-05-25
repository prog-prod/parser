<?php

namespace App\Notifications;

use App\Models\StockOverview;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class StockUpdated extends Notification
{
    use Queueable;

    protected StockOverview $stock;
    protected string $notificationMessage;

    /**
     * Create a new notification instance.
     *
     * @param StockOverview $stock
     * @param string $notificationMessage
     *
     * @return void
     */
    public function __construct(StockOverview $stock, string $notificationMessage)
    {
        $this->stock = $stock;
        $this->notificationMessage = $notificationMessage;
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
        $url = route('vue-route', ['path' => 'dashboard/stocks/' . $this->stock->stock_id]);

        return TelegramMessage::create()
            ->to($notifiable->telegram_id)
            ->content($this->notificationMessage)
            ->button('See changes', $url);
    }
}
