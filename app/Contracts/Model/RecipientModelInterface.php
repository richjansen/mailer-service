<?php

namespace App\Contracts;

/**
 * Interface RecipientModelInterface
 * @package App\Contracts
 */
interface RecipientModelInterface
{
    /**
     * @param string $name
     * @return RecipientModelInterface
     */
    public function setName(string $name): RecipientModelInterface;

    /**
     * @param string $emailAddress
     * @return RecipientModelInterface
     */
    public function setEmailAddress(string $emailAddress): RecipientModelInterface;
}
