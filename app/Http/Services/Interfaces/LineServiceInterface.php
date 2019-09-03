<?php


namespace App\Http\Services\Interfaces;


use LINE\LINEBot;
use LINE\LINEBot\Event\BaseEvent;

interface LineServiceInterface
{
    public function parseEvent(LINEBot $bot, string $content, string $signature);
    public function delegateEvent(LINEBot $bot, BaseEvent $event);
}