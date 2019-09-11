<?php

namespace App\Contracts;

use App\Services\MailApis\ApiAbstract;

/**
 * Interface MailClientResponseAwareInterface
 * @package App\Contracts
 */
interface MailClientResponseAwareInterface
{
    /**
     * @return mixed
     */
    public function getResponse();

    /**
     * @return ApiAbstract
     */
    public function getMailApi(): ApiAbstract;
}
