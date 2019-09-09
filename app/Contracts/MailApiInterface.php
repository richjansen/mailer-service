<?php

namespace App\Contracts;

/**
 * Interface MailApiInterface
 * @package App\Contracts
 */
interface MailApiInterface
{
    /**
     * @param $response
     * @return mixed
     */
    public function handleResponse($response);
}
