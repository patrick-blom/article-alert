<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Adapter\Model;

use PaBlo\ArticleAlert\Domain\Model\Contract\User;

/**
 * Class SimpleUser
 * @package PaBlo\ArticleAlert\Adapter\Model
 */
class SimpleUser implements User
{
    /**
     * @var string
     */
    private $email;

    /**
     * SimpleOxidUser constructor.
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return sha1($this->email());
    }
}
