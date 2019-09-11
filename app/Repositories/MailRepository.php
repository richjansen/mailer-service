<?php

namespace App\Repositories;

use App\Contracts\MailModelInterface;
use App\Contracts\RecipientModelInterface;
use App\Mail;

/**
 * Class MailRepository
 * @package App\Repositories
 */
class MailRepository
{
    /**
     * @param string $html
     * @param string|null $subject
     * @param RecipientModelInterface $recipient
     * @return MailModelInterface
     */
    public function create(string $html, string $subject = null, RecipientModelInterface $recipient): MailModelInterface
    {
        $mail = new Mail();

        $mail
            ->setBody($html)
            ->setSubject($subject)
            ->setRecipient($recipient)
        ;

        return $mail;
    }

    /**
     * @param Mail $mailModel
     * @return bool
     */
    public function save(Mail $mailModel): bool
    {
        return $mailModel->save();
    }
}
