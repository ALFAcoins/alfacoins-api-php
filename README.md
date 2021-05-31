## Description

**alfacoins-api-php** is a PHP Library for interacting with [ALFAcoins API](https://www.alfacoins.com/developers).

**alfacoins-api-php** provides cryptocurrency payment integration on your website via [ALFAcoins](https://www.alfacoins.com).

**alfacoins-api-php** allows you to integrate payments with the following cryptocurrencies:
* Bitcoin (BTC)
* Ethereum (ETH)
* XRP (XRP)
* Bitcoin Cash (BCH)
* Litecoin (LTC)
* Dash (DASH)

## Installation

alfacoins-api-php is available on [Packagist](https://packagist.org/packages/alfacoins/alfacoins-api-php) (using semantic versioning), and installation via [composer](https://getcomposer.org) is the recommended way to install alfacoins-api-php. Just add this line to your `composer.json` file:

```json
"alfacoins/alfacoins-api-php": "~v1.0"
```

or run

```sh
composer require alfacoins/alfacoins-api-php
```

Note that the `vendor` folder and the `vendor/autoload.php` script are generated by composer; they are not part of alfacoins-api-php.

Alternatively, if you're not using composer, copy the contents of the alfacoins-api-php folder somewhere and load each class file manually:

```php
<?php
// include once ALFAcoins Private API class
require_once '../src/ALFAcoins_privateAPI.php';
require_once '../src/ALFAcoins_Exception.php';
use ALFAcoins\ALFAcoins_privateAPI;
use ALFAcoins\ALFAcoins_Exception;
```

To work with unstable version simply clone this repository:

```sh
git clone https://github.com/alfacoins/alfacoins-api-php
cd alfacoins-api-php/
```

## Getting Started

See the [examples](examples/) directory for examples of how to use this library.

Additional information and API documentation is here: [ALFAcoins API Reference](https://www.alfacoins.com/developers).
