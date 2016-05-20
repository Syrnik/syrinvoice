<?php

/**
 * @package Syrinvoice.Controllers
 * @version 2.2.0
 * @copyright (c) 2014-2016, Serge Rodovnichenko
 * @license http://www.webasyst.com/terms/#eula Webasyst
 */
class shopSyrinvoicePluginPrintformDisplayAction extends waViewAction
{
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
        $this->view->assign('content', $plugin->renderForm($order_id));
    }
}
