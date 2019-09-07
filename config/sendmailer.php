<?php

use App\Services\MailApis\Mailjet;

return [
    'apis' => [
        'mailjet' => [
            'client'    => Mailjet::class,
            'key'   => '2148b792ebc2bc76aa4d9cbac7eac876',
            'secret'    => 'a112ac86b57e2293ba45ada99498106f',
        ]
    ]
];
