<?php


namespace App\Http\Services;


use App\Http\Services\Interfaces\LineServiceInterface;
use Carbon\Carbon;
use Config;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use Log;

class LineService implements LineServiceInterface
{

    public function createBot(): LINEBot
    {
        $accessTokenExpireTime = config('services.line.access_token_expire_time');
        $accessToken = config('services.line.access_token');
        $channelSecret = config('services.line.channel_secret');
        $channelId = config('services.line.channel_id');
        if (Carbon::parse($accessTokenExpireTime)->lessThanOrEqualTo(Carbon::now())) {
            $this->revokeAccessToken($accessToken);
            $accessToken = $this->createAccessToken($accessToken, $channelSecret, $channelId);
        }

        $httpClient = new CurlHTTPClient($accessToken);
        return new LINEBot($httpClient, ['channelSecret' => $channelSecret]);
    }

    private function createAccessToken(string $accessToken, string $channelSecret, string $channelId)
    {
        $httpClient = new CurlHTTPClient($accessToken);
        $bot = new LINEBot($httpClient, ['channelSecret' => $channelSecret]);
        $response = $bot->createChannelAccessToken($channelId);
        if ($response->getHTTPStatus() == 200) {
            $body = $response->getJSONDecodedBody();
            Config::set('services.line.access_token_expire_time', Carbon::now()->addSeconds($body['expires_in'])->toDateTimeString());
            Config::set('services.line.access_token', $accessToken = $body['access_token']);
        } else {
            Log::warning("http status: {$response->getHTTPStatus()}, body: {$response->getRawBody()}");
            $accessToken = null;
        }

        return $accessToken;
    }

    private function revokeAccessToken(string $accessToken): void
    {
        $httpClient = new CurlHTTPClient($accessToken);
        $bot = new LINEBot($httpClient, ['channelSecret' => config('services.line.channel_secret')]);
        $response = $bot->revokeChannelAccessToken($accessToken);
        if ($response->getHTTPStatus() != 200) {
            Log::warning("http status: {$response->getHTTPStatus()}, body: {$response->getRawBody()}");
        }
    }
}