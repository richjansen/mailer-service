<?php

namespace App\Contracts;

/**
 * Interface MailModelInterface
 * @package App\Contracts
 */
interface MailModelInterface
{
    /**
     * @param string $body
     * @return MailModelInterface
     */
    public function setBody(string $body): MailModelInterface;

    /**
     * @param string $subject
     * @return MailModelInterface
     */
    public function setSubject(string $subject): MailModelInterface;
}
