<?php


namespace App\Helper\Line\Events\Message;


use App\Traits\Logger;
use LINE\LINEBot;

/**
 * Class AbstractMessageHelper
 * @package App\Helper\Line\Events\Message
 * @property LINEBot $bot
 * @property string $replyToken
 * @property LINEBot\Event\MessageEvent $event
 */
abstract class AbstractMessageHelper
{
    use Logger;

    protected $event;
    protected $replyToken;
    protected $bot;

    public function __construct(LINEBot $bot, string $replyToken, $event)
    {
        $this->replyToken = $replyToken;
        $this->bot = $bot;
        $this->event = $event;
    }

    abstract public function reply();
}