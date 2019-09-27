<?php

namespace App;

use App\Contracts\RecipientModelInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Recipient
 * @package App
 */
class Recipient extends Model implements RecipientModelInterface
{
    /**
     * @param string $name
     * @return RecipientModelInterface
     */
    public function setName(string $name): RecipientModelInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $emailAddress
     * @return RecipientModelInterface
     */
    public function setEmailAddress(string $emailAddress): RecipientModelInterface
    {
        $this->email_address = $emailAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress(): string
    {
        return $this->email_address;
    }
}
