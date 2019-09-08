<?php

namespace App\Services\MailApis;

use App\Contracts\MailApiInterface;
use Mailjet\{
    Resources,
    Client,
    Response
};

/**
 * Class Mailjet
 * @package App\Services\MailApis
 */
class MailjetApi implements MailApiInterface
{

    /**
     * @var Client
     */
    private $mailClient;

    /**
     * Mailjet constructor.
     * @param string $key
     * @param string $secret
     */
    public function __construct(Client $mailClient)
    {
        $this->mailClient = $mailClient;
    }

    /**
     * @param $htmlBody
     * @return Response
     */
    public function send($htmlBody)
    {
        $args       = ['body' => $this->createMail($htmlBody)];
        $response   = $this->mailClient->post(Resources::$Email, $args);

        return $response;
    }

    /**
     * @param string $htmlBody
     * @return array
     */
    private function createMail(string $htmlBody): array
    {
        return [
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
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
    }
}
