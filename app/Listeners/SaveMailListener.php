<?php

namespace App\Listeners;

use App\Repositories\MailRepository;

/**
 * Class SaveMailListener
 * @package App\Listeners
 */
class SaveMailListener
{
    /**
     * @var MailRepository
     */
    private $mailRepository;

    /**
     * SaveMailListener constructor.
     * @param MailRepository $mailRepository
     */
    public function __construct(MailRepository $mailRepository)
    {
        $this->mailRepository = $mailRepository;
    }

    /**
     * @param  $event
     */
    public function handle($event)
    {
        $this->mailRepository->save($event->getMail());
    }
}
