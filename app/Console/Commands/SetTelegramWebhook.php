<?php

namespace App\Console\Commands;

use App\Services\TelegramService;
use Illuminate\Console\Command;

class SetTelegramWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tg:webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Telegram Webhook';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return boolean
     */
    public function handle() : bool
    {
        (new TelegramService())->removeWebhook();
        return (new TelegramService())->setWebhook();
    }
}
