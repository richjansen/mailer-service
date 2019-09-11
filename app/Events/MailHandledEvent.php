<?php

namespace App\Events;

use App\Contracts\MailModelInterface;
use App\Mail;
use App\Repositories\MailRepository;
use Mailjet\Response;

/**
 * Class MailHandledEvent
 * @package App\Events
 */
class MailHandledEvent
{
    /**
     * @var Mail
     */
    private $mail;

    /**
     * @var
     */
    private $mailRepository;

    /**
     * MailHandledEvent constructor.
     * @param MaiMailModelInterfacel $mail
     * @param MailRepository $mailRepository
     */
    public function __construct(MailModelInterface $mail, MailRepository $mailRepository)
    {
        $this->mail             = $mail;
        $this->mailRepository   = $mailRepository;
    }

    /**
     * @return Response
     */
    public function getMail(): MailModelInterface
    {
        return $this->mail;
    }

    /**
     * @return MailRepository
     */
    public function getMailRepository(): MailRepository
    {
        return $this->mailRepository;
    }
}
