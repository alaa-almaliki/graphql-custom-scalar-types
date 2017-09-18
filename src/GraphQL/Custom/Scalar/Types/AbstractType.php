<?php
namespace GraphQL\Custom\Scalar\Types;

use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Type\Definition\CustomScalarType;
use GraphQL\Utils;

/**
 * Class AbstractType
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
abstract class AbstractType extends CustomScalarType implements TypeValidationInterface, TypeMessageInterface
{
    /**
     * @return string
     */
    abstract protected function getTypeName();

    /**
     * @param  string $value
     * @return mixed
     */
    abstract protected function evaluateValue($value);

    /**
     * BasicEmailType constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $config = [
            'name' => $this->getTypeName(),
            'serialize' => [$this, 'serialize'],
            'parseValue' => [$this, 'parseValue'],
            'parseLiteral' => [$this, 'parseLiteral'],
        ];
        parent::__construct($config);
    }

    /**
     * @param  string $value
     * @return mixed
     */
    public function validateValue($value)
    {
        if (!$this->evaluateValue($value)) {
            throw new \UnexpectedValueException($this->getValueErrorMessage() . ': ' . Utils::printSafe($value));
        }

        return $this;
    }

    /**
     * @param  \GraphQL\Language\AST\Node $valueNode
     * @return $this
     * @throws Error
     */
    public function validateLiteral($valueNode)
    {
        if (!$valueNode instanceof StringValueNode) {
            throw new Error($this->getLiteralErrorMessage() . ': ' . $valueNode->kind, [$valueNode]);
        }
        if (!$this->evaluateValue($valueNode->value)) {
            throw new Error("Not a valid email", [$valueNode]);
        }

        return $this;
    }

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
