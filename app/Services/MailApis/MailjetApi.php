<?php

namespace App\Services\MailApis;

use App\Contracts\MailApiInterface;
use App\Exceptions\ServiceOfflineException;
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
     * @throws ServiceOfflineException
     */
    public function send($htmlBody)
    {
        $args = ['body' => $this->createMail($htmlBody)];

        try {
            $response = $this->mailClient->post(Resources::$Email, $args);
        } catch (\Exception $e) {
            throw new ServiceOfflineException($e);
        }

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
                        'Name'  =>  config('mail.from.name'),
                    ],
                    'To' => [
                        [
                            'Email' => env('TEST_EMAIL'),
                            'Name'  => "Test User",
                        ]
                    ],
                    'Subject'  => "Greetings from Mailjet.",
                    'TextPart' => "My first Mailjet email",
                    'HTMLPart' => $htmlBody . " Mailjet",
                    'CustomID' => "AppGettingStartedTest"
                ]
            ]
        ];
    }
}
