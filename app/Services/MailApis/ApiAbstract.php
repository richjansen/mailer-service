<?php

namespace App\Services\MailApis;

use App\Exceptions\ServiceOfflineException;

/**
 * Class ApiAbstract
 * @package App\Services\MailApis
 */
abstract class ApiAbstract
{
    /**
     * @var array
     */
    protected $mailSettings;

    /**
     * @var SendGrid
     */
    protected $mailerService;

    /**
     * @param array $mailSettings
     * @return ApiAbstract
     */
    public function setMailSettings(array $mailSettings): ApiAbstract
    {
        $this->mailSettings = $mailSettings;

        return $this;
    }
}
