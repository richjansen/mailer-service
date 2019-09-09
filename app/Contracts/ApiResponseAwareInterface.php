<?php

namespace App\Contracts;

use App\Services\MailApis\ApiAbstract;

/**
 * Interface ApiResponseAwareInterface
 * @package App\Contracts
 */
interface ApiResponseAwareInterface
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
