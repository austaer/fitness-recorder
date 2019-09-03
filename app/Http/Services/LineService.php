<?php


namespace App\Http\Services;


use App\Helper\Line\EventExecutor;
use App\Helper\Line\Events\AbstractEventHelper;
use App\Http\Services\Interfaces\LineServiceInterface;
use Config;
use LINE\LINEBot;
use LINE\LINEBot\Event\BaseEvent;
use LINE\LINEBot\Exception\InvalidEventRequestException;
use LINE\LINEBot\Exception\InvalidSignatureException;
use Log;

class LineService implements LineServiceInterface
{
    public function parseEvent(LINEBot $bot, string $content, string $signature)
    {
        try {
            return $bot->parseEventRequest($content, $signature);
        } catch (InvalidSignatureException $e) {
            return response('Invalid signature', 400);
        } catch (InvalidEventRequestException $e) {
            return response('Invalid event request', 400);
        }
    }

    /**
     * @param LINEBot $bot
     * @param BaseEvent $event
     */
    public function delegateEvent(LINEBot $bot, BaseEvent $event)
    {
        $eventType = "lineevents.event.{$event->getType()}";
        if (Config::has($eventType)) {
            /**@var  AbstractEventHelper $eventHelper **/
            $className = (Config::get($eventType));
            $eventHelper = new $className($bot, $event);
            EventExecutor::execute($eventHelper);
        }
    }
}