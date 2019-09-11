<?php

namespace App\Contracts;

/**
 * Interface MailApiInterface
 * @package App\Contracts
 */
interface ClientResponseInterface
{
    /**
     * @param $response
     * @return mixed
     */
    public function handleClientResponse($response);
}
