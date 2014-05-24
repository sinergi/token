# Token

[![Build Status](https://travis-ci.org/sinergi/token.svg)](https://travis-ci.org/sinergi/token)

A handful of tools for PHP developers.

<a name="requirements"></a>
## Requirements

This library uses PHP 5.4+.

<a name="installation"></a>
## Installation

It is recommended that you install the Token library [through composer](http://getcomposer.org/). To do so, add the following lines to your ``composer.json`` file.

```json
{
    "require": {
       "sinergi/token": "dev-master"
    }
}
```

<a name="usage"></a>
## Usage

```php
use Sinergi\Token\StringGenerator;

StringGenerator::randomAlnum(32);
```

### Methods

 * `randomAlnum` Generate alpha-numeric string
     * __Parameters__
     * `int $length` The length of the string to generate
     * _Optional_ `bool $onlyUppercase` Use only uppercase letters

 * `randomAlpha` Generate alpha string
     * __Parameters__
     * `int $length` The length of the string to generate
     * _Optional_ `bool $onlyUppercase` Use only uppercase letters

 * `randomNumeric` Generate numeric string
     * __Parameters__
     * `int $length` The length of the string to generate

 * `randomHexa` Generate hexa string
     * __Parameters__
     * `int $length` The length of the string to generate

 * `randomUuid` Generate uuid string

 * `randomId` Generate id string
