<?php


namespace App\Helper\Line\Events\Message;


use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ImageMessageHelper extends AbstractMessageHelper
{

    public function reply()
    {
        $messageId = $this->event->getMessageId();
        $response = $this->bot->getMessageContent($messageId);
        if ($response->isSucceeded()) {
            $fileName = Carbon::now()->format('YmdHis') . Str::random(10);
            \Storage::disk('public')->put("img/{$fileName}", $response->getRawBody());
            $this->bot->replyText($this->replyToken, "收到圖片啦. 連結: " . \Storage::disk('public')->url("img/{$fileName}"));
        }
    }
}