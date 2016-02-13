<?php

/**
 * @package Syrinvoice
 * @author Serge Rodovnichenko <sergerod@gmail.com>
 * @version 2.1.0
 * @copyright (c) 2014-2016, Serge Rodovnichenko
 * @license http://www.webasyst.com/terms/#eula Webasyst
 */
class shopSyrinvoicePlugin extends shopPrintformPlugin
{

    /**
     * Safe for rights getting order data
     * @param $order_id
     * @param $options
     * @throws waException
     * @return waOrder
     */
    public function getOrder($order_id, $options = array())
    {
        switch (wa()->getEnv()) {
            case 'backend':
                if (!wa()->getUser()->getRights('shop', !$order_id ? 'settings' : 'orders')) {
                    throw new waException(_w("Access denied"));
                }
                if ($order_id) {
                    $order = shopPayment::getOrderData($order_id, $this);
                    if (!$order) {
                        throw new waException('Order not found', 404);
                    }
                } else {
                    $config = wa('shop')->getConfig();
                    /**
                     * @var shopConfig $config
                     */
                    $allowed_currencies = $this->allowedCurrency();
                    if ($allowed_currencies !== true) {
                        $allowed_currencies = (array)$allowed_currencies;
                        $currencies = $config->getCurrencies();
                        $matched_currency = array_intersect($allowed_currencies, array_keys($currencies));
                        if (!$matched_currency) {
                            $message = _w('Data cannot be processed because required currency %s is not defined in your store settings.');
                            throw new waException(sprintf($message, implode(', ', $allowed_currencies)));
                        }
                        $currency = reset($matched_currency);

                    } else {
                        $currency = $config->getCurrency();
                    }
                    $dummy_order = array(
                        'contact_id' => wa()->getUser()->getId(),
                        'id'         => 1,
                        'id_str'     => shopHelper::encodeOrderId(1),
                        'currency'   => $currency,
                        'items'      => array(),
                    );
                    $order = waOrder::factory($dummy_order);
                }
                break;
            default:
                //frontend
                if ($order_id) {
                    $order = shopPayment::getOrderData($order_id, $this);
                }
                if (empty($order)) {
                    throw new waException('Order not found', 404);
                }
                break;
        }
        if (!empty($options['items'])) {
            $this->extendItems($order, $options['items']);
        }
        return $order;
    }

    /**
     *
     * @param waOrder $order
     * @param mixed[] $params
     * @return array
     */
    protected function extendItems(&$order, $params)
    {
        $discounted_items = (bool)$this->getSettings('ITEM_DISCOUNT');
        $items = $order->items;
        $product_model = new shopProductModel();
        $discount = $order->discount;
        foreach ($items as & $item) {
            $data = $product_model->getById($item['product_id']);
            $item['tax_id'] = ifset($data['tax_id']);
            $item['currency'] = $order->currency;
            if (!empty($item['total_discount']) && $discounted_items) {
                $discount -= $item['total_discount'];
                $item['total'] -= $item['total_discount'];
                $item['price'] -= $item['total_discount'] / $item['quantity'];
            }
        }

        unset($item);
        $taxes_params = array(
            'billing'  => $order->billing_address,
            'shipping' => $order->shipping_address,
        );
        shopTaxes::apply($items, $taxes_params, $order->currency);

        //TODO allow setup tax & discount calculation
        if ($discount && $discounted_items) {
            #calculate discount as part of price
            if ($order->total + $discount - $order->shipping > 0) {
                $k = 1.0 - ($discount) / ($order->total + $discount - $order->shipping);
            } else {
                $k = 0.0;
            }

            foreach ($items as & $item) {
                if ($item['tax_included']) {
                    $item['tax'] = round($k * $item['tax'], 4);
                }
                $item['price'] = round($k * $item['price'], 4);
                $item['total'] = round($k * $item['total'], 4);
            }
            unset($item);
        }
        $order->items = $items;
    }
}
