<?php

namespace App\Traits;

trait MailSettingsTrait
{
    /**
     * @var array
     */
    private $mailSettings;

    /**
     * @param array $mailSettings
     * @return MailSettingsTrait
     */
    public function setMailSettings(array $mailSettings): self
    {
        $this->mailSettings = $mailSettings;

        return $this;
    }
}
