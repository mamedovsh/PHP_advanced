<?php
namespace App\Commands;

use App\Application;
use App\Telegram\TelegramApiImpl;

class TgMessagesCommand extends Command
{
    // public Aplications $app;
    public function __construct(public Application $app)
    {
        $this->app = $app;
    }

    public function run(array $options = []): void
    {
        $tgApi = new TelegramApiImpl($this->app->env('TELEGRAM_TOKEN'));

        echo json_encode($tgApi->getMessage(0));
        
        // $eventSender = new EventSender(new TelegramApiImpl($this->app->env('TELEGRAM_TOKEN')));

        // $cron = new Cron();

        // $eventModel = new Event(new SQLite($this-> app));
        // $eventSaver = new EventSaver($eventModel);
        // $tgEvents = new TgEvents($cron, $eventSaver, $tgApi, $eventSender);

        // while(true) {
        //     $tgEvents->handle();
        //     sleep(1);

        // }
    }
}
