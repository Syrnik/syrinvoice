<?php
/**
 * @author Serge Rodovnichenko <serge@syrnik.com>
 * @copyright Serge Rodovnichenko, 2026
 * @license Webasyst
 */

declare(strict_types=1);

class shopSyrinvoicePluginViewHelper extends \waPluginViewHelper
{
    public function sortOrderItems(waOrder $order, string $sort = 'name'): array
    {
        /**
         * @var array{
         *     id:int,
         *     name:string,
         *     description:string,
         *     img:string,
         *     price:float,
         *     height:float,
         *     width:float,
         *     length:float,
         *     weight:float,
         *     quantity:float,
         *     discount:float,
         *     total_dicount:float,
         *     total:float,
         *     tax_rate:float,
         *     tax_included: bool,
         *     stock_unit:string,
         *     product_codes:array}[] $items
         */
        $items = $order->items;

        $fields = array_filter(array_map('trim', explode(',', $sort)));
        $allowed = ['name', 'weight', 'price', 'quantity', 'total'];
        $stringFields = ['name'];

        usort($items, function (array $a, array $b) use ($fields, $allowed, $stringFields): int {
            foreach ($fields as $field) {
                if (!in_array($field, $allowed, true)) {
                    continue;
                }
                if (in_array($field, $stringFields, true)) {
                    $cmp = strcmp(
                        mb_strtolower((string)($a[$field] ?? '')),
                        mb_strtolower((string)($b[$field] ?? ''))
                    );
                } else {
                    $cmp = ($a[$field] ?? 0) <=> ($b[$field] ?? 0);
                }
                if ($cmp !== 0) {
                    return $cmp;
                }
            }
            return 0;
        });

        return $items;
    }
}
