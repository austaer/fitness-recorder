<?php


namespace App\Helper\Line\Events;


use LINE\LINEBot;

/**
 * Class AbstractEventHelper
 * @package App\Helper\Line\Events
 * @property LINEBot $bot
 * @property LINEBot\Event\BaseEvent $event
 */
abstract class AbstractEventHelper
{
    protected $bot;
    protected $event;

    public function __construct(LINEBot $bot, $event)
    {
        $this->bot = $bot;
        $this->event = $event;
    }

    abstract public function execute();
}