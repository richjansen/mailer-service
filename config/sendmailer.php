<?php

use App\Services\MailApis\{MailjetApi, SendGridApi};

return [
    'apis' => [
        'mailjet' => [
            'client'    => MailjetApi::class,
            'args' => [
                'key'       => env('MAILJET_KEY'),
                'secret'    => env('MAILJET_SECRET'),
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
        'from'          => env('MAIL_FROM_ADDRESS'),
        'name'          => env('MAIL_FROM_NAME'),
        'subject'       => "Dit is een testmailtje",
        'content-type'  => 'text/html',
    ]
];
