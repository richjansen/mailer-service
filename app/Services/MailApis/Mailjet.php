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
class Mailjet implements MailApiInterface
{

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $secret;

    /**
     * Mailjet constructor.
     * @param string $key
     * @param string $secret
     */
    public function __construct(string $key, string $secret)
    {
        $this->key      = $key;
        $this->secret   = $secret;
    }

    /**
     * @param array $config
     * @return Mailjet
     */
    public static function create(array $config): MailApiInterface
    {
        return new self($config['key'], $config['secret']);
    }

    /**
     * @param $htmlBody
     * @return Response
     */
    public function send($htmlBody): Response
    {
        $client     = new Client($this->key, $this->secret,true,['version' => 'v3.1']);
        $args       = ['body' => $this->createBodyArray($htmlBody)];
        $response   = $client->post(Resources::$Email, $args);

        return $response;
    }

    /**
     * @param string $htmlBody
     * @return array
     */
    private function createBodyArray(string $htmlBody): array
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
