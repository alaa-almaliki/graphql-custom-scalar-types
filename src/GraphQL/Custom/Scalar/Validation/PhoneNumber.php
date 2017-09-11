<?php
namespace GraphQL\Custom\Scalar\Validation;

use GraphQL\Custom\Scalar\Validation\Traits\PhoneNumberTrait;

/**
 * Class PhoneNumber
 * @package GraphQL\Custom\Scalar\Validation
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class PhoneNumber extends AbstractValidator
{
    use PhoneNumberTrait;

    /** @var  string */
    private $regionCode;

    /**
     * @param  string $regionCode
     * @return $this
     */
    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegionCode()
    {
        return $this->regionCode;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return self::getPhoneUtil()->isValidNumber(
            self::getPhoneUtil()->parse($this->getValue(),
                $this->getRegionCode())
        );
    }
}