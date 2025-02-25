<?php
namespace App\EventSender;

use App\Telegram\TelegramApi;

class EventSender
{
    public function __construct(private TelegramApi $telegram)
    {
        $this->telegram = $telegram;
    }

    public function sendMessage(string $receiver, string $message)
    {
        $this->telegram->sendMessage($receiver, $message);
        echo date(format: 'd.m.y H:i') . " я отправил сообщение $message пoлучaтелю c id $receiver\n";
    }
}
