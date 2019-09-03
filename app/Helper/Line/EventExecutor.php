<?php


namespace App\Helper\Line;


use App\Helper\Line\Events\AbstractEventHelper;

class EventExecutor
{
    public static function execute(AbstractEventHelper $eventHelper)
    {
        $eventHelper->execute();
    }
}