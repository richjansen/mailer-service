<?php

namespace App\Repositories;

use App\Contracts\RecipientModelInterface;
use App\Recipient;

/**
 * Class RecipientRepository
 * @package App\Repositories
 */
class RecipientRepository
{
    /**
     * @param string $emailAddress
     * @param string $name
     * @return RecipientModelInterface
     */
    public function create(string $emailAddress, string $name): RecipientModelInterface
    {
        $recipient = new Recipient();
        $recipient
            ->setEmailAddress($emailAddress)
            ->setName($name)
        ;

        return $recipient;
    }

    /**
     * @param string $emailAddress
     * @param string $name
     * @return RecipientModelInterface
     */
    public function findOrCreate(string $emailAddress, string $name): RecipientModelInterface
    {
        $recipient = $this->create($emailAddress, $name);

        return Recipient::firstOrCreate($recipient->toArray());
    }

    /**
     * @param Recipient $recipient
     * @return bool
     */
    public function save(Recipient $recipient)
    {
        return $recipient->save();
    }
}
