<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Domain\Model\Contract;

/**
 * Interface Article
 * @package PaBlo\ArticleAlert\Domain\Model\Contract
 */
interface Article
{

    /**
     * @param string $id
     * @return bool
     */
    public function load(string $id): bool;

    /**
     * @return string
     */
    public function name(): string;

}
