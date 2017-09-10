<?php
namespace GraphQL\Custom\Scalar;

use GraphQL\Custom\Scalar\Validation\Email;
use GraphQL\Custom\Scalar\Validation\PhoneNumber;

/**
 * Class Validation
 * @package GraphQL\Custom\Scalar
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class Validation
{
    /**
     * @param  string $email
     * @param  string $mode
     * @return bool
     */
    static public function isValidEmail($email, $mode = Email::EMAIL_VALIDATION_BASIC)
    {
        return (new Email($email))
            ->setValidationMode($mode)
            ->isValid();
    }

    /**
     * @param  string $phoneNumber
     * @param  string $regionCode
     * @return bool
     */
    static public function isValidPhoneNumber($phoneNumber, $regionCode)
    {
        return (new PhoneNumber($phoneNumber))
            ->setRegionCode($regionCode)
            ->isValid();
    }
}