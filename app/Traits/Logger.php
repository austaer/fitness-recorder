<?php


namespace App\Traits;


Trait Logger
{
    /**
     * @param string $level
     * @param string $message
     */
    protected function log(string $level = 'info', string $message = '')
    {
        if(in_array($level, ['info', 'warning', 'debug', 'error']) && $message != '') {
            \Log::log($level, $message);
        }
    }
}