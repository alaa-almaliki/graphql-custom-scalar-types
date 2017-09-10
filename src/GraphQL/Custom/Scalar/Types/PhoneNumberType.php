<?php
namespace GraphQL\Custom\Scalar\Types;

use GraphQL\Custom\Scalar\Validation;

/**
 * Class PhoneNumberType
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class PhoneNumberType extends AbstractType implements TypeParamsInterface
{
    /** @var  array */
    private $parameters;

    /**
     * @return string
     */
    protected function getTypeName()
    {
        return 'PhoneNumber';
    }

    /**
     * @return string
     */
    public function getValueErrorMessage()
    {
        return 'Cannot represent value as phone number';
    }

    /**
     * @return string
     */
    public function getLiteralErrorMessage()
    {
        return 'Not a valid phone number';
    }

    /**
     * @param  string $value
     * @return bool
     */
    protected function evaluateValue($value)
    {
        return Validation::isValidPhoneNumber($value, $this->getValue('region_code'));
    }

    /**
     * @param  array $parameters
     * @return $this
     */
    public function setParameters(array $parameters)
    {
       $this->parameters = $parameters;
       return $this;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param  string $key
     * @return mixed|null
     */
    public function getValue($key)
    {
        if (!array_key_exists($key, $this->parameters)) {
            return null;
        }

        return $this->parameters[$key];
    }
}