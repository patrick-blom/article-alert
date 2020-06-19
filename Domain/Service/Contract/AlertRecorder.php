<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Domain\Service\Contract;

use PaBlo\ArticleAlert\Domain\Struct\AlertRecorderArgument;

/**
 * Interface AlertRecorder
 * @package PaBlo\ArticleAlert\Domain\Service\Contract
 */
interface AlertRecorder
{
    /**
     * @param AlertRecorderArgument $recorderArgument
     * @return bool
     */
    public function record(AlertRecorderArgument $recorderArgument): bool;
}
