<?php

require_once dirname(__FILE__) . '/libphonenumber.php';

use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumber;

class EPhoneNumber extends CApplicationComponent
{
    private $_util;
    
    public function init()
    {
        parent::init();
        
        $this->_util = PhoneNumberUtil::getInstance();
    }
    
    /**
     * Checking the number is valid or not  
     *
     * @return boolean
     */
    public function validate(PhoneNumber $number)
    {
        return $this->_util->isValidNumber($number);
    }

    /**
     * Return international format
     *
     * @return string
     */
    public function toInternational(PhoneNumber $number)
    {
        return $this->_util->format($number, PhoneNumberFormat::INTERNATIONAL);
    }

    /**
     * Return national format
     *
     * @return string
     */
    public function toNational(PhoneNumber $number)
    {
        return $this->_util->format($number, PhoneNumberFormat::NATIONAL);
    }

    /**
     * Return E164 (http://en.wikipedia.org/wiki/E.164) format
     *
     * @return string
     */
    public function toE164(PhoneNumber $number)
    {
        return $this->_util->format($number, PhoneNumberFormat::E164);
    }
    
    /**
     * Return RFC3966 (http://www.ietf.org/rfc/rfc3966.txt) format
     *
     * @return string
     */
    public function toRFC3966(PhoneNumber $number)
    {
        return $this->_util->format($number, PhoneNumberFormat::RFC3966);
    }
    
    /**
    * Any requests to set or get attributes or call methods on this class that
    * are not found are redirected to the {@link PhoneNumberUtil} object.
    *
    * @param string $name the method name
    * @param array $parameters
    * @return mixed
    */
    public function __call($name, $parameters)
    {
        if(method_exists($this->_util, $name)) {
            return call_user_func_array(array($this->_util, $name), $parameters);
        } else {
            return parent::__call($name, $parameters);
        }
    }
}