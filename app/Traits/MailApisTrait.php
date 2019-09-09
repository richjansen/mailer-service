<?php

namespace App\Traits;

use App\Contracts\MailApiInterface;

/**
 * Trait MailApisTrait
 * @package App\Traits
 */
trait MailApisTrait
{
    /**
     * @var array
     */
    private $mailApis = [];

    /**
     * @param MailApiInterface $mailApi
     * @return $this
     */
    public function addApi(MailApiInterface $mailApi): self
    {
        $mailApi->setMailSettings($this->mailSettings);

        // @todo Make sure there are no duplicate apis
        $this->mailApis[] = $mailApi;

        return $this;
    }
}
