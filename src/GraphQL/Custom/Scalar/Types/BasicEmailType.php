<?php
namespace GraphQL\Custom\Scalar\Types;

use GraphQL\Custom\Scalar\Validation;

/**
 * Class EmailType
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class BasicEmailType extends AbstractType
{
    /**
     * @return string
     */
    protected function getTypeName()
    {
        return 'Email';
    }

    /**
     * @return string
     */
    public function getValueErrorMessage()
    {
        return 'Cannot represent value as email';
    }

    /**
     * @return string
     */
    public function getLiteralErrorMessage()
    {
        return 'Not a valid email';
    }

    /**
     * @param  string $value
     * @return bool
     */
    protected function evaluateValue($value)
    {
        return Validation::isValidEmail($value);
    }
}