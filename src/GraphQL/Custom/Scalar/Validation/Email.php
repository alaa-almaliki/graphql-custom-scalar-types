<?php
namespace GraphQL\Custom\Scalar\Validation;


/**
 * Class Email
 * @package GraphQL\Custom\Scalar\Types\Validation
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class Email extends AbstractValidator
{
    const EMAIL_VALIDATION_BASIC    = 'basic';
    const EMAIL_VALIDATION_STRICT   = 'strict';

    private $validationMode;

    /**
     * @param  string $validationMode
     * @return $this
     */
    public function setValidationMode($validationMode)
    {
        $this->validationMode = $validationMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidationMode()
    {
        return $this->validationMode ?: self::EMAIL_VALIDATION_BASIC;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return static::getValidationObject($this->getValidationMode())
            ->isValid($this->getValue());
    }

    /**
     * @param $mode
     * @return \GraphQL\Custom\Scalar\Validation\Email\AbstractEmail
     */
    private function getValidationObject($mode)
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