<?php
namespace App\Telegram;
 
class TelegramApiImpl implements TelegramApi {
const ENDPOINT = 'https://api.telegram.org/bot';
private int $offset;
private string $token;

public function __construct(string $token)
{
    $this ->token = $token;
}
 
public function getMessages(int $offset): array
{
 
}
public function sendMessage(string $chatId, string $text): void
 
{
$url = self::ENDPOINT . $this->token . '/sendMessage';
 
$data = [
'chat_id' => $chatId,
'text' => $text,
];
$ch = curl_init($url);
 
$jsonData = json_encode($data);
 
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
curl_exec($ch);
}
}