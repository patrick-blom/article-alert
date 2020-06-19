<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Adapter\Storage;

use PaBlo\ArticleAlert\Domain\Storage\Contract\Alert;
use PaBlo\ArticleAlert\Domain\Struct\AlertStorageArgument;

/**
 * Class OxidTmpFile
 * @package PaBlo\ArticleAlert\Adapter\Repository
 */
class OxidTmpFile implements Alert
{
    private const FILENAME = 'article_alert_db';

    /**
     * @var string
     */
    private $path;

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * @param AlertStorageArgument $storageArgument
     * @return bool
     */
    public function persist(AlertStorageArgument $storageArgument): bool
    {
        $user = $storageArgument->user();
        $article = $storageArgument->article();

        return $this->writeToDisk(
            $this->path . DIRECTORY_SEPARATOR . self::FILENAME,
            sprintf(
                '%s - %s' . PHP_EOL,
                $user->email(),
                $article->name()
            ),
            FILE_APPEND
        );
    }

    /**
     * @param string $path
     * @param string $content
     * @param int $flag
     *
     * @return bool
     */
    private function writeToDisk(string $path, string $content, int $flag = 0): bool
    {
        return (bool)file_put_contents($path, $content, $flag);
    }
}
