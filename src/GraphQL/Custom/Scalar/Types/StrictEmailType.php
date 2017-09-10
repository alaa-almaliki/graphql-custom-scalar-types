<?php
namespace GraphQL\Custom\Scalar\Types;

use GraphQL\Custom\Scalar\Validation\Email;

class StrictEmailType extends BasicEmailType
{
    /**
     * @param  string $value
     * @return bool
     */
    protected function isValidEmail($value)
    {
        return Email::isValid($value, Email::EMAIL_VALIDATION_STRICT);
    }
}