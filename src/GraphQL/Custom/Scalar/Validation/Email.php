<?php
namespace GraphQL\Custom\Scalar\Validation;

/**
 * Class Email
 * @package GraphQL\Custom\Scalar\Types\Validation
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class Email
{
    const EMAIL_VALIDATION_BASIC    = 'basic';
    const EMAIL_VALIDATION_STRICT   = 'strict';

    /**
     * @param  string $email
     * @param  string $mode
     * @return bool
     */
    static public function isValid($email, $mode = self::EMAIL_VALIDATION_BASIC)
    {
        return static::getValidationObject($mode)->isValid($email);
    }

    /**
     * @param $mode
     * @return \GraphQL\Custom\Scalar\Validation\Email\AbstractEmail
     */
    static private function getValidationObject($mode)
    {
        static $modes = [
            self::EMAIL_VALIDATION_BASIC => 'BasicEmail',
            self::EMAIL_VALIDATION_STRICT => 'StrictEmail',
        ];

        if (!array_key_exists($mode, $modes)) {
            return null;
        }

        $classParts = [
            __NAMESPACE__,
            'Email',
            $modes[$mode],
        ];
        $class = implode('\\', $classParts);
        return new $class();
    }
}