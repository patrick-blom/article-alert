<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Adapter\Service;

use PaBlo\ArticleAlert\Adapter\Model\SimpleUser;
use PaBlo\ArticleAlert\Domain\Model\Contract\Article;
use PaBlo\ArticleAlert\Domain\Service\Contract\AlertRecorder;
use PaBlo\ArticleAlert\Domain\Struct\AlertRecorderArgument;

/**
 * Class OxidEmailAlert
 * @package PaBlo\ArticleAlert\Adapter\Service
 */
class OxidEmailAlert
{
    /**
     * @var AlertRecorder
     */
    private $alertRecorder;
    /**
     * @var Article
     */
    private $article;

    /**
     * @param AlertRecorder $alertRecorder
     * @param Article $article
     */
    public function __construct(AlertRecorder $alertRecorder, Article $article)
    {
        $this->alertRecorder = $alertRecorder;
        $this->article = $article;
    }

    /**
     * @param string $email
     * @param string $articleId
     * @return bool
     */
    public function createNewAlert(string $email, string $articleId): bool
    {
        $user = new SimpleUser($email);

        if ($this->article->load($articleId)) {
            return $this->alertRecorder->record(
                AlertRecorderArgument::fromUserAndArticle(
                    $user,
                    clone $this->article
                )
            );
        }

        return false;
    }
}
