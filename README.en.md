# Simple Invoice — Shop-Script Plugin

**English** | [Русский](README.md)

A printform plugin for Shop-Script orders. Generates a clean invoice with order contents — handy for picking, delivery, and customer verification on receipt.

![Invoice screenshot](img/screenshot_1.png)

## Features

- Displays order items, shipping address, and customer comments
- Optional company details fields (leave blank if unused)
- Total unit count for products (services excluded)
- Highlights line items whose quantity exceeds a configurable threshold
- Editable template — easy to customise for your needs

## Requirements

- Webasyst Framework 2.0+
- Shop-Script 7.1+
- PHP 7.2+

## Installation

Install via the [Webasyst Store](https://www.webasyst.com/store/plugin/shop/syrinvoice/).

## Usage in templates (for developers)

The plugin registers a Smarty view helper accessible in the printform template as `{$wa->shop->syrinvoicePlugin}`.

### Method `sortOrderItems`

Returns order items sorted by the specified field (or a combination of fields).

```smarty
{* Sort by a single field *}
{$items = $wa->shop->syrinvoicePlugin->sortOrderItems($order, 'name')}

{* Sort by multiple fields: by name first, then by price on a tie *}
{$items = $wa->shop->syrinvoicePlugin->sortOrderItems($order, 'name, price')}

{* The sort parameter is optional and defaults to 'name' *}
{$items = $wa->shop->syrinvoicePlugin->sortOrderItems($order)}
```

Supported sort fields: `name`, `price`, `weight`, `quantity`, `total`.  
String fields (`name`) are compared case-insensitively.

## Support

[www.syrnik.com/support/](https://www.syrnik.com/support/)

## Changelog

[CHANGELOG.md](CHANGELOG.md)
