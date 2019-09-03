<?php


namespace App\Helper\Line\Events;


use App\Helper\Line\Events\Message\AbstractMessageHelper;
use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent;
use Log;

/**
 * Class MessageEventHelper
 * @package App\Helper\Line\Events
 * @property MessageEvent $event
 */
class MessageEventHelper extends AbstractEventHelper
{

    public function execute()
    {
        $messageType = "lineevents.message.{$this->event->getMessageType()}";
        if (\Config::has($messageType)) {
            $className = \Config::get($messageType);
            /**@var  AbstractMessageHelper $messageHelper */
            $messageHelper = new $className($this->bot, $this->event->getReplyToken(), $this->event);
            $messageHelper->reply();
        }
    }
}