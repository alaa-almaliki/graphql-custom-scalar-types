<?php
namespace GraphQL\Custom\Scalar\Types;

use GraphQL\Custom\Scalar\Validation;
use GraphQL\Custom\Scalar\Validation\Email;

/**
 * Class StrictEmailType
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class StrictEmailType extends BasicEmailType
{
    /**
     * @param  string $value
     * @return bool
     */
    protected function evaluateValue($value)
    {
        return Validation::isValidEmail($value, Email::EMAIL_VALIDATION_STRICT);
    }
}
