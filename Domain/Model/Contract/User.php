<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Domain\Model\Contract;

/**
 * Interface User
 * @package PaBlo\ArticleAlert\Domain\Model\Contract
 */
interface User
{
    /**
     * @return string
     */
    public function email(): string;

    /**
     * @return string
     */
    public function id(): string;
}
