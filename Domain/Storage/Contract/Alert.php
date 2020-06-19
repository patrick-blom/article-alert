<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Domain\Storage\Contract;

use PaBlo\ArticleAlert\Domain\Struct\AlertStorageArgument;

/**
 * Interface Alert
 * @package PaBlo\ArticleAlert\Domain\Storage\Contract
 */
interface Alert
{

    /**
     * @param AlertStorageArgument $storageArgument
     * @return bool
     */
    public function persist(AlertStorageArgument $storageArgument): bool;
}
