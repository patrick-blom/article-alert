<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Adapter\Model;

use OxidEsales\Eshop\Application\Model\Article as oxArticle;
use PaBlo\ArticleAlert\Domain\Model\Contract\Article;

/**
 * Class SimpleArticle
 * @package PaBlo\ArticleAlert\Adapter\Model
 */
class SimpleArticle implements Article
{
    /**
     * @var oxArticle
     */
    private $article;

    /**
     * @param oxArticle $article
     */
    public function __construct(oxArticle $article)
    {
        $this->article = $article;
    }

    /**
     * @param string $id
     * @return bool
     */
    public function load(string $id): bool
    {
        return $this->article->load($id);
    }

    /**
     * @return string
     */
    public function name(): string
    {
        if (!$this->loaded()) {
            return 'unkown';
        }

        return $this->article->getFieldData('oxtitle');
    }

    /**
     * @return bool
     */
    public function loaded(): bool
    {
        return $this->article->isLoaded();
    }
}
