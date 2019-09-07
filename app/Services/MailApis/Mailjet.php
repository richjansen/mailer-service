<?php

namespace App\Services\MailApis;

use App\Contracts\MailApiInterface;
use Mailjet\{
    Resources,
    Client
};

class Mailjet implements MailApiInterface
{

    private $key;

    private $secret;

    public function __construct(string $key, string $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    public static function create(array $config)
    {
        return new self($config['key'], $config['secret']);
    }

    public function send($htmlBody)
    {
        $mj = new Client($this->key, $this->secret,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => config('mail.from.address'),
                        'Name' =>  config('mail.from.name'),
                    ],
                    'To' => [
                        [
                            'Email' => "richard.chantal@gmail.com",
                            'Name' => "Richard"
                        ]
                    ],
                    'Subject' => "Greetings from Mailjet.",
                    'TextPart' => "My first Mailjet email",
                    'HTMLPart'  => $htmlBody,
//                    'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);

        return $response;

//        $response->success() && var_dump($response->getData());
//
//        return $response->success();
    }
}
