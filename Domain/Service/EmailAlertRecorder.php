<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Domain\Service;

use PaBlo\ArticleAlert\Domain\Service\Contract\AlertRecorder;
use PaBlo\ArticleAlert\Domain\Storage\Contract\Alert as AlertStorage;
use PaBlo\ArticleAlert\Domain\Struct\AlertRecorderArgument;
use PaBlo\ArticleAlert\Domain\Struct\AlertStorageArgument;

/**
 * Class EmailAlertRecorder
 * @package PaBlo\ArticleAlert\Domain\Service
 */
class EmailAlertRecorder implements AlertRecorder
{
    /**
     * @var AlertStorage
     */
    private $alertStorage;

    /**
     * AlertRecorder constructor.
     * @param AlertStorage $alertStorage
     */
    public function __construct(AlertStorage $alertStorage)
    {
        $this->alertStorage = $alertStorage;
    }

    /**
     * @param AlertRecorderArgument $recorderArgument
     * @return bool
     */
    public function record(AlertRecorderArgument $recorderArgument): bool
    {
        return $this->alertStorage->persist(
            AlertStorageArgument::fromUserAndArticle(
                $recorderArgument->user(),
                $recorderArgument->article()
            )
        );
    }
}
