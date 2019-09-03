<?php


namespace App\Http\Controllers;

use App;
use App\Utils\Line\LineBotUtils;
use Illuminate\Http\Request;
use LINE\LINEBot;

class LineController extends Controller
{
    private $lineService;

    public function __construct(App\Http\Services\Interfaces\LineServiceInterface $lineService)
    {
        $this->lineService = $lineService;
    }

    public function reply(Request $request)
    {
        $bot = LineBotUtils::createBot();
        $signature = $request->attributes->get(LINEBot\Constant\HTTPHeader::LINE_SIGNATURE);
        $events = $this->lineService->parseEvent($bot, $request->getContent(), $signature);

        foreach ($events as $event) {
            $this->lineService->delegateEvent($bot, $event);
        }
    }
}