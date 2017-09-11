<?php
namespace GraphQL\Custom\Scalar\Validation;

use GraphQL\Custom\Scalar\Validation\Traits\PhoneNumberTrait;

/**
 * Class PhoneRegion
 * @package GraphQL\Custom\Scalar\Validation
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class PhoneRegion extends AbstractValidator
{
    use PhoneNumberTrait;

    /**
     * @return bool
     */
    public function isValid()
    {
        $region = $this->valueToRegion($this->getValue());
        if (!$region) {
            return false;
        }

        return $this->getValue() == $this->valueToRegion($region);
    }

    /**
     * @return string
     */
    public function getValue()
    {
        if (is_numeric($this->value)) {
            return ltrim($this->value, '+0');
        }

        return parent::getValue();
    }

    /**
     * @param  string $value
     * @return int|string
     */
    protected function valueToRegion($value)
    {
        if (is_numeric($value)) {
            return $this->getPhoneUtil()->getRegionCodeForCountryCode($value);
        }

        return $this->getPhoneUtil()->getCountryCodeForRegion($value);
    }
}