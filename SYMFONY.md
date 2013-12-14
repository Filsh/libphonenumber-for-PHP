Add the following line to app/autoload.php:
require __DIR__.'/../vendor/mch0lic/libphonenumber-for-php/libphonenumber/libphonenumber.php';

Don't forget namespace when using library:
use libphonenumber\PhoneNumberUtil;