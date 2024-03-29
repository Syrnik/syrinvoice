<?php
/**
 * @package Syrinvoice.Controllers
 * @copyright (c) 2014-2022, Serge Rodovnichenko
 * @license http://www.webasyst.com/terms/#eula Webasyst
 */

declare(strict_types=1);

/**
 * Class shopSyrinvoicePluginPrintformDisplayAction
 * @ControllerAction printform/display
 */
class shopSyrinvoicePluginPrintformDisplayAction extends waViewAction
{
    /**
     * @throws waException
     * @throws waRightsException
     */
    public function execute()
    {
        if (!wa()->getUser()->getRights('shop', 'orders')) {
            throw new waRightsException('Access denied');
        }

        /**
         * @var shopSyrinvoicePlugin $plugin
         */
        $plugin = wa('shop')->getPlugin('syrinvoice');
        $order_id = waRequest::request('order_id', null, waRequest::TYPE_INT);
        $this->view->assign('interactive', $plugin->getSettings('INTERACTIVE'));
        $this->view->assign('content', $plugin->renderPrintform($order_id));
    }
}
