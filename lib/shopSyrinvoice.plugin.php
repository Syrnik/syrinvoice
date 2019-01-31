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
    public function renderPrintform($data)
    {
        $locale = 'ru_RU';
        $old_locale = wa()->getLocale();
        if ($locale !== $old_locale) {
            wa()->setLocale($locale);
        }
        $res = parent::renderPrintform($data);
        if ($locale !== $old_locale) {
            wa()->setLocale($old_locale);
        }
        return $res;
    }
}