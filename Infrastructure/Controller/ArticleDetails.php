<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Infrastructure\Controller;

use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Application\Controller\ArticleDetailsController;


/**
 * Class ArticleDetails extends the OXID ArticleDetailsController
 * @package PaBlo\ArticleAlert\Infrastructure\Component
 * @mixin  ArticleDetailsController
 */
class ArticleDetails extends ArticleDetails_parent
{
    /**
     * Calls mailing service and informs the user if
     * the action was successful or not
     */
    public function addArticleAlert(): void
    {
        $language = Registry::getLang();

        $this->_aViewData['articleAlertStatusMessage'] = $language->translateString('PB_CREATE_ARTICLE_ALERT_CREATED');
        $this->_aViewData['articleAlertStatusMessageType'] = 'notice';

        $alertCreated = false;

        if(false === $alertCreated){
            $this->_aViewData['articleAlertStatusMessage'] = $language->translateString('PB_CREATE_ARTICLE_ALERT_ERROR');
            $this->_aViewData['articleAlertStatusMessageType'] = 'error';

        }
    }
}
