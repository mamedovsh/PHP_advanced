<?php

use App\Commands\TgMessagesCommand;
use App\Application;
use App\Telegram\TelegramApiImpl;
use PHPUnit\Framework\TestCase;

class TgMessagesCommandTest extends TestCase
{
    public function testRunOutputsCorrectJson()
    {
        
        $mockTelegramApi = $this->getMockBuilder(TelegramApiImpl::class)
            ->setMethods(['getMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }
}