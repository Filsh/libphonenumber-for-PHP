yii-libphonenumber
=============
Yii Framework extension for parsing, formatting, storing and validating international phone numbers.
This library forked from https://github.com/davideme/libphonenumber-for-PHP

## Setup

In order to start using the formatters you need to configure it for your application.

```php
'components' => array(
    'phoneNumber' => array(
        'class' => 'application.extensions.libphonenumber.EPhoneNumber'
    ),
),
```

## Usage

Once you have configured the formatted you can use it by calling the format component.

```php
$phoneNumber = Yii::app()->phoneNumber;

$mPhoneNumber = $phoneNumber->parse('+380567934826', 'UA');

$phoneNumber->validate($mPhoneNumber); // 'true' if valid number
$phoneNumber->toE164($mPhoneNumber); // +380567934826
$phoneNumber->toInternational($mPhoneNumber); // +380 56 793 4826
$phoneNumber->toNational($mPhoneNumber); // 056 793 4826
$phoneNumber->toRFC3966($mPhoneNumber);// +380-56-793-4826
```
