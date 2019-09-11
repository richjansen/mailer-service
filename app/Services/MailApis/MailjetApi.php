<?php

namespace App\Services\MailApis;

use App\Contracts\ClientResponseInterface;
use App\Exceptions\ServiceOfflineException;
use Mailjet\{
    Resources,
    Client,
    Response
};
use Exception;

/**
 * Class Mailjet
 * @package App\Services\MailApis
 */
class MailjetApi extends ApiAbstract implements ClientResponseInterface
{
    /**
     * MailjetApi constructor.
     * @param Client $mailClient
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
            return $this->mailClient->post(Resources::$Email, $args);
        } catch (Exception $e) {
            throw new ServiceOfflineException($e);
        }
    }

    /**
     * @param string $htmlBody
     * @return array
     */
    protected function createMail(string $htmlBody): array
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

    /**
     * @param $response
     */
    public function handleClientResponse($response)
    {
        dd("Mailjet handle response");
    }
}
