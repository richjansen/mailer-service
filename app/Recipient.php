<?php

namespace App;

use App\Contracts\RecipientModelInterface;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model implements RecipientModelInterface
{
    public function setName(string $name): RecipientModelInterface
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmailAddress(string $emailAddress): RecipientModelInterface
    {
        $this->email_address = $emailAddress;

        return $this;
    }

    public function getEmailAddress(): string
    {
        return $this->email_address;
    }
}
