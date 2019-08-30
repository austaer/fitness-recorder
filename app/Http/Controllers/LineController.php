<?php


namespace App\Http\Controllers;

use App\Http\Services\Interfaces\LineServiceInterface;
use LINE\LINEBot\Constant\HTTPHeader;
use Request;

class LineController extends Controller
{
    private $lineService = null;

    public function __construct(LineServiceInterface $lineService)
    {
        $this->lineService = $lineService;
    }

    public function reply(Request $request)
    {
        $bot = $this->lineService->createBot();
        $signature = $request->getHeader(HTTPHeader::LINE_SIGNATURE);
        if (empty($signature)) {
            return response('Bad Request', 400);
        }
    }
}