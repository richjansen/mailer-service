<?php

namespace App;

use App\Contracts\MailModelInterface;
use App\Contracts\RecipientModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mail extends Model implements MailModelInterface
{
    public function recipient(): HasOne
    {
        return $this->hasOne(Recipient::class);
    }

    public function setBody(string $body): MailModelInterface
    {
        $this->body = $body;

        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setSubject(string $subject): MailModelInterface
    {
        $this->subject = $subject;

        return $this;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setRecipient(RecipientModelInterface $recipient): MailModelInterface
    {
        $this->recipient_id = $recipient->id;

        return $this;
    }
}
