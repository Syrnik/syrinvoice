<?php
/**
 * @package Syrinvoice
 * @author Serge Rodovnichenko <sergerod@gmail.com>
 * @copyright (c) 2014-2022, Serge Rodovnichenko
 * @license http://www.webasyst.com/terms/#eula Webasyst
 */

declare(strict_types=1);

/**
 * Main plugin class
 */
class shopSyrinvoicePlugin extends shopPrintformPlugin
{
    /**
     * @return array
     * @throws waException
     */
    public function listCurrencies(): array
    {
        /** @noinspection PhpPossiblePolymorphicInvocationInspection */
        $currencies = wa('shop')->getConfig()->getCurrencies();

        $list = array();
        foreach ($currencies as $key => $currency) {
            $list[] = array('value' => $key, 'title' => $currency['title']);
        }

        return $list;
    }
}
