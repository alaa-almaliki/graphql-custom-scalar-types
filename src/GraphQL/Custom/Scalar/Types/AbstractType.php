<?php
namespace GraphQL\Custom\Scalar\Types;

use GraphQL\Error\Error;
use GraphQL\Type\Definition\CustomScalarType;

/**
 * Class AbstractType
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
abstract class AbstractType extends CustomScalarType implements \ValidatorInterface
{
    /**
     * @param  string $value
     * @return mixed
     */
    abstract public function validateValue($value);

    /**
     * @param  \GraphQL\Language\AST\Node $valueNode
     * @return mixed
     */
    abstract public function validateLiteral($valueNode);

    /**
     * @param  string $value
     * @return mixed
     */
    public function serialize($value)
    {
        return $this->parseValue($value);
    }

    /**
     * @param  string $value
     * @return mixed
     */
    public function parseValue($value)
    {
        $this->validateValue($value);
        return $value;
    }

    /**
     * @param  \GraphQL\Language\AST\Node $valueNode
     * @return string
     * @throws Error
     */
    public function parseLiteral($valueNode)
    {
        $this->validateLiteral($valueNode);
        return parent::parseLiteral($valueNode->value);
    }
}