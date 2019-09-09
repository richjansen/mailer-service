<?php

namespace App\Traits;

trait MailSettingsTrait
{
    /**
     * @var array
     */
    private $mailSettings;

    /**
     * SendMailerService constructor.
     * @param array $mailSettings
     */
    public function __construct(array $mailSettings)
    {
        $this->mailSettings = $mailSettings;
    }


}
