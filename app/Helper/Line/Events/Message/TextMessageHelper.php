<?php

namespace App\Helper\Line\Events\Message;


use LINE\LINEBot\Event\MessageEvent\TextMessage;

/**
 * Class TextMessageHelper
 * @package App\Helper\Line\Events\Message
 * @property TextMessage $event
 */
class TextMessageHelper extends AbstractMessageHelper
{
    public function reply()
    {
        $text = $this->event->getText();
        $this->log('info', $this->replyToken);
        $res = $this->bot->replyText($this->replyToken, $text);
        $this->log('info', "status: {$res->getHTTPStatus()}, response body: {$res->getRawBody()}");
    }
}