<?php

use App\Services\MailApis\{MailjetApi, SendGridApi};

return [
    'apis' => [
        'mailjet' => [
            'client'    => MailjetApi::class,
            'args' => [
                'key'       => '2148b792ebc2bc76aa4d9cbac7eac876',
                'secret'    => 'a112ac86b57e2293ba45ada99498106f',
                'settings'  => ['version' => 'v3.1'],
            ],
        ],
        'sendgrid' => [
            'client'    => SendGridApi::class,
            'args' => [
                'api-key'   => env('SENDGRID_API_KEY'),
            ],
        ],
    ],
    'mail-settings' => [
        'from' => config('mail.from'),
        'subject'   => "Dit is een testmailtje",
        'content-type'  => 'text/html',
    ]
];
