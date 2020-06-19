<?php

declare(strict_types=1);

namespace PaBlo\ArticleAlert\Infrastructure\Application\Controller;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Request;
use OxidEsales\EshopCommunity\Application\Controller\ArticleDetailsController;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use PaBlo\ArticleAlert\Adapter\Service\OxidEmailAlert;


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
        $container = ContainerFactory::getInstance()->getContainer();

        if (
            Registry::getSession()->getId() &&
            Registry::getSession()->isActualSidInCookie() &&
            !Registry::getSession()->checkSessionChallenge()
        ) {
            $container->get(LoggerInterface::class)->warning('EXCEPTION_NON_MATCHING_CSRF_TOKEN');
            Registry::getUtilsView()->addErrorToDisplay('ERROR_MESSAGE_NON_MATCHING_CSRF_TOKEN');

            return;
        }

        if (Registry::getUtils()->isSearchEngine()) {
            return;
        }

        $language = Registry::getLang();

        $this->_aViewData['articleAlertStatusMessage'] = $language->translateString('PB_CREATE_ARTICLE_ALERT_CREATED');
        $this->_aViewData['articleAlertStatusMessageType'] = 'notice';

        /** @var OxidEmailAlert $emailAlertService */
        $emailAlertService = $container->get(OxidEmailAlert::class);

        $request = Registry::get(Request::class);

        $articleId = $request->getRequestEscapedParameter('aid');
        $emailAddress = $request->getRequestEscapedParameter('emailAddress');

        $alertCreated = false;
        if (null !== $articleId && null !== $emailAddress) {
            $alertCreated = $emailAlertService->createNewAlert($emailAddress, $articleId);
        }

        if (false === $alertCreated) {
            $this->_aViewData['articleAlertStatusMessage'] = $language->translateString('PB_CREATE_ARTICLE_ALERT_ERROR');
            $this->_aViewData['articleAlertStatusMessageType'] = 'error';
        }
    }
}
