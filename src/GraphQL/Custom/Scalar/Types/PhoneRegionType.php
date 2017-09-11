<?php
namespace GraphQL\Custom\Scalar\Types;

use GraphQL\Custom\Scalar\Validation;

/**
 * Class PhoneRegionType
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class PhoneRegionType extends AbstractType
{
    /**
     * @return string
     */
    protected function getTypeName()
    {
        return 'PhoneRegion';
    }

    /**
     * @param  string $value
     * @return bool
     */
    protected function evaluateValue($value)
    {
        return Validation::isValidPhoneRegion($value);
    }

    /**
     * @return string
     */
    public function getValueErrorMessage()
    {
        return 'Cannot represent value as phone region';
    }

    /**
     * @return string
     */
    public function getLiteralErrorMessage()
    {
        return 'Not a valid phone region';
    }
}