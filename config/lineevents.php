<?php


use App\Helper\Line\Events as Events;
use App\Helper\Line\Events\Message as Message;

return [
    'event' => [
        'message' => Events\MessageEventHelper::class,
        'follow' => 'LINE\LINEBot\Event\FollowEvent',
        'unfollow' => 'LINE\LINEBot\Event\UnfollowEvent',
        'join' => 'LINE\LINEBot\Event\JoinEvent',
        'leave' => 'LINE\LINEBot\Event\LeaveEvent',
        'postback' => 'LINE\LINEBot\Event\PostbackEvent',
        'beacon' => 'LINE\LINEBot\Event\BeaconDetectionEvent',
        'accountLink' => 'LINE\LINEBot\Event\AccountLinkEvent',
        'memberJoined' => 'LINE\LINEBot\Event\MemberJoinEvent',
        'memberLeft' => 'LINE\LINEBot\Event\MemberLeaveEvent',
        'things' => 'LINE\LINEBot\Event\ThingsEvent',
    ],
    'message' => [
        'text' => Message\TextMessageHelper::class,
        'image' => Message\ImageMessageHelper::class,
        'sticker' => Message\StickerMessageHelper::class,
//        'video' => 'LINE\LINEBot\Event\MessageEvent\VideoMessage',
//        'audio' => 'LINE\LINEBot\Event\MessageEvent\AudioMessage',
//        'file' => 'LINE\LINEBot\Event\MessageEvent\FileMessage',
//        'location' => 'LINE\LINEBot\Event\MessageEvent\LocationMessage',
    ]
];