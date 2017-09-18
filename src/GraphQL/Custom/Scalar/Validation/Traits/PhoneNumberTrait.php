<?php
namespace GraphQL\Custom\Scalar\Validation\Traits;

use libphonenumber\PhoneNumberUtil;

/**
 * Trait PhoneNumber
 * @package GraphQL\Custom\Scalar\Validation\Traits
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
trait PhoneNumberTrait
{
    /** @var  PhoneNumberUtil */
    private static $phoneNumberUtils;

    /**
     * @return PhoneNumberUtil
     */
    protected function getPhoneUtil()
    {
        return self::$phoneNumberUtils ?: (self::$phoneNumberUtils = PhoneNumberUtil::getInstance());
    }
}
