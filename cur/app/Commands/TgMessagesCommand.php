<?php
namespace App\Commands;

use App\Application;
use App\Telegram\TelegramApiImpl;
use Predis\Client;
use App\cache\Redis;

class TgMessagesCommand extends Command
{
    // public Aplications $app;
    private int $offset;
    private array|null $oldMessages;
    private Redis $redis;


    public function __construct(public Application $app)
    {
        $this->app = $app;
        $this->offset = 0;
        $this->oldMessages =[];
        // $this->redis = new Redis();

        $client = new Client([
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379,
            ]);
            $this->redis = new Redis($client);
}
function run(array $options = []): void
{
echo json_encode($this->receiveNewMessages());
}
protected function getTelegramApiImpl(): TelegramApiImpl
{
return new TelegramApiImpl($this->app-> env( key: 'TELEGRAM_TOKEN'));
}
private function receiveNewMessages(): array
{
$offset = $this->redis->get(key: 'tg_messages: offset', default: 0);

$result = $tgApi->getMessages($offset);

$this->redis->set(key: 'tg_messages: offset', value: $result['offset'] ?? 0);

$oldMessages = json_decode($this->redis->get(key: 'tg_messages:old_messages'));

// $messages [];

foreach ($result['result'] ?? [ ] as $chatId => $newMessage) {

if (isset($oldMessages[$chatId])) {

$oldMessages[$chatId] = [...$oldMessages [$chatId], ... $newMessage];

} else {

$oldMessages [$chatId] = $newMessage;

}

$messages[$chatId] = $oldMessages[$chatId];
}
$this->redis->set(key. 'tg_messages:old_messages', json_encode($oldMessages));

return $messages;
}
}