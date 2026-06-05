# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- README in Russian and English, cross-linked
- CHANGELOG in Keep a Changelog format
- Webasyst EULA license files in English and Russian

## [4.1.1] - 2023-05-22

### Fixed

- Phone number fields display compatibility with Webasyst framework 2.8+

## [4.1.0] - 2022-11-25

### Added

- Shop-Script Premium support
- Units of measure displayed for order items

## [4.0.0] - 2021-02-04

### Added

- Ukrainian locale (`uk_UA`)

### Changed

- PHP 7.2+ is now required
- Code cleanup and optimization

## [3.0.0] - 2019-02-15

### Added

- Total quantity counter for products (services are excluded from the count)
- Bold highlighting for line items whose quantity exceeds a configurable threshold
- Improved visual grouping of services and regular products in the template

### Changed

- All CSS moved to the main template file for easier per-store customization

### Removed

- Shop-Script 6 support

## [2.2.0] - 2016-05-27

### Added

- Settings to enable/disable interactive on-screen elements (print dialog, close button) for compatibility with Shop-Script mass-print mode

## [2.1.0] - 2016-02-18

### Added

- Configurable option to apply order discounts to line items

## [2.0.1] - 2016-02-11

### Fixed

- Print dialog no longer fails to open automatically on page load

## [2.0.0] - 2016-02-08

### Changed

- Internal code refactoring and template cleanup
- Added access rights check for order data

## [1.1.2] - 2015-03-25

### Fixed

- Shop-Script 6 compatibility

## [1.1.1] - 2014-09-18

### Added

- "Close" button in the invoice template
- Print dialog opens automatically on page load

## [1.1.0] - 2014-05-05

### Added

- Currency selection for the invoice
- Currency conversion support

## [1.0.0] - 2014-05-05

### Added

- Initial release

[Unreleased]: https://github.com/Syrnik/syrinvoice/compare/v4.1.1...HEAD
[4.1.1]: https://github.com/Syrnik/syrinvoice/compare/v4.1.0...v4.1.1
[4.1.0]: https://github.com/Syrnik/syrinvoice/compare/v4.0.0...v4.1.0
[4.0.0]: https://github.com/Syrnik/syrinvoice/compare/v3.0.0...v4.0.0
[3.0.0]: https://github.com/Syrnik/syrinvoice/compare/v2.2.0...v3.0.0
[2.2.0]: https://github.com/Syrnik/syrinvoice/compare/v2.0.0...v2.2.0
[2.0.0]: https://github.com/Syrnik/syrinvoice/compare/v1.1.2...v2.0.0
[1.1.2]: https://github.com/Syrnik/syrinvoice/compare/v1.1.1...v1.1.2
[1.1.1]: https://github.com/Syrnik/syrinvoice/compare/v1.1.0...v1.1.1
[1.1.0]: https://github.com/Syrnik/syrinvoice/compare/v1.0.0...v1.1.0
[1.0.0]: https://github.com/Syrnik/syrinvoice/releases/tag/v1.0.0
