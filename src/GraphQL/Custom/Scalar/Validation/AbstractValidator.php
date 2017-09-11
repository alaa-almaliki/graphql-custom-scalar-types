<?php
namespace GraphQL\Custom\Scalar\Validation;

/**
 * Class AbstractValidator
 * @package GraphQL\Custom\Scalar\Validation
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
abstract class AbstractValidator
{
    /** @var  string */
    protected $value;

    /**
     * AbstractValidator constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    abstract public function isValid();
}