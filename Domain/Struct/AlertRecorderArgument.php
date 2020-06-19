<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Domain\Struct;


use PaBlo\ArticleAlert\Domain\Model\Contract\Article;
use PaBlo\ArticleAlert\Domain\Model\Contract\User;

/**
 * Class AlertRecorderArgument
 * @package PaBlo\ArticleAlert\Domain\Struct
 */
final class AlertRecorderArgument
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var Article
     */
    private $article;

    /**
     * @param User $user
     * @param Article $article
     */
    private function __construct(User $user, Article $article)
    {
        $this->user = $user;
        $this->article = $article;
    }

    /**
     * @param User $user
     * @param Article $article
     * @return static
     */
    public static function fromUserAndArticle(User $user, Article $article): self
    {
        return new static($user, $article);
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }

    /**
     * @return Article
     */
    public function article(): Article
    {
        return $this->article;
    }
}
