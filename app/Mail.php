<?php

namespace App;

use App\Contracts\MailModelInterface;
use App\Contracts\RecipientModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Mail
 * @package App
 */
class Mail extends Model implements MailModelInterface
{
    /**
     * @return HasOne
     */
    public function recipient(): HasOne
    {
        return $this->hasOne(Recipient::class);
    }

    /**
     * @param string $body
     * @return MailModelInterface
     */
    public function setBody(string $body): MailModelInterface
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $subject
     * @return MailModelInterface
     */
    public function setSubject(string $subject): MailModelInterface
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param RecipientModelInterface $recipient
     * @return MailModelInterface
     */
    public function setRecipient(RecipientModelInterface $recipient): MailModelInterface
    {
        $this->recipient_id = $recipient->id;

        return $this;
    }
}
