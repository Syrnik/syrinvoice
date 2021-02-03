<?php
/**
 * @package Syrinvoice
 * @author Serge Rodovnichenko <sergerod@gmail.com>
 * @version 3.0.0
 * @copyright (c) 2014-2016, Serge Rodovnichenko
 * @license http://www.webasyst.com/terms/#eula Webasyst
 */
class shopSyrinvoicePlugin extends shopPrintformPlugin
{
    public function renderPrintform($data): string
    {
        $this->setOrderOption('items', null);
        return parent::renderPrintform($data);
    }

    /**
     * @return array
     * @throws waException
     */
    public function listCurrencies(): array
    {
        $currencies = wa('shop')->getConfig()->getCurrencies();
        $list = array();
        foreach ($currencies as $key => $currency) {
            $list[] = array('value' => $key, 'title' => $currency['title']);
        }

        return $list;
    }
}
