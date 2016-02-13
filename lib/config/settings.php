<?php
/**
 * @package Syrinvoice.Config
 * @version 2.1.0
 * @copyright (c) 2014-2016, Serge Rodovnichenko
 * @license http://www.webasyst.com/terms/#eula Webasyst
 */

$syrInvoiceCurrencies = waSystem::getInstance('shop')->getConfig()->getCurrencies();
$syrInvoiceCurrOptions = array();
foreach ($syrInvoiceCurrencies as $key => $value) {
    $syrInvoiceCurrOptions[$key] = $value['title'];
}

return array(
    'COMPANY_NAME' => array(
        'value'        => '',
        'title'        => _wp('Company Name'),
        'description'  => _wp('Your company name'),
        'control_type' => 'text',
        'subject'      => 'printform',
    ),
    'COMPANY_SLOGAN' => array(
        'value'        => '',
        'title'        => _wp('Company Slogan'),
        'description'  => _wp('Your company slogan'),
        'control_type' => 'text',
        'subject'      => 'printform',
    ),
    'COMPANY_ADDRESS_STREET' => array(
        'value'        => '',
        'title'        => _wp('Company street'),
        'description'  => _wp('Your company street address'),
        'control_type' => 'text',
        'subject'      => 'printform',
    ),
    'COMPANY_ADDRESS_CITY' => array(
        'value'        => '',
        'title'        => _wp('Company city'),
        'description'  => _wp('Your company city'),
        'control_type' => 'text',
        'subject'      => 'printform',
    ),
    'COMPANY_ADDRESS_STATE' => array(
        'value'        => '',
        'title'        => _wp('Company state/region'),
        'description'  => _wp('Your company state/region'),
        'control_type' => 'text',
        'subject'      => 'printform',
    ),
    'COMPANY_ADDRESS_ZIP' => array(
        'value'        => '',
        'title'        => _wp('Company zip code'),
        'description'  => _wp('Your company zip/postal code'),
        'control_type' => 'text',
        'subject'      => 'printform',
    ),
    'COMPANY_ADDRESS_COUNTRY' => array(
        'value'        => '',
        'title'        => _wp('Company country'),
        'description'  => _wp('Your company country'),
        'control_type' => 'text',
        'subject'      => 'printform',
    ),
    'COMPANY_PHONE' => array(
        'value'        => '',
        'title'        => _wp('Company phone'),
        'description'  => _wp('Your company phone'),
        'control_type' => 'text',
        'subject'      => 'printform',
    ),
    'CURRENCY' => array(
        'value' => waSystem::getInstance('shop')->getConfig()->getCurrency(),
        'title' => _wp('Currency'),
        'description' => _wp('Select the currency for the invoice'),
        'control_type' => waHtmlControl::SELECT,
        'options' => $syrInvoiceCurrOptions
    ),
    'ITEM_DISCOUNT' => array(
        'value'        => 0,
        'title'        => _wp('Apply discount to goods'),
        'description'  => _wp(
            'Apply discount to every ordered product item. All product prices will be lowered by ' .
            'value of discount if this option is turned on.'
        ),
        'control_type' => waHtmlControl::CHECKBOX
    )
);