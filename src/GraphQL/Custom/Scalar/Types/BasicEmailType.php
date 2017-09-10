<?php
namespace GraphQL\Custom\Scalar\Types;

use GraphQL\Custom\Scalar\Validation\Email;
use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Utils;

/**
 * Class EmailType
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class BasicEmailType extends AbstractType
{
    /**
     * BasicEmailType constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $config = [
            'name' => 'Email',
            'serialize' => [$this, 'serialize'],
            'parseValue' => [$this, 'parseValue'],
            'parseLiteral' => [$this, 'parseLiteral'],
        ];
        parent::__construct($config);
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function validateValue($value)
    {
        if (!$this->isValidEmail($value)) {
            throw new \UnexpectedValueException("Cannot represent value as email: " . Utils::printSafe($value));
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
            throw new Error('Query error: Can only parse strings got: ' . $valueNode->kind, [$valueNode]);
        }
        if (!$this->isValidEmail($valueNode->value)) {
            throw new Error("Not a valid email", [$valueNode]);
        }

        return $this;
    }

    /**
     * @param  string $value
     * @return bool
     */
    protected function isValidEmail($value)
    {
        return Email::isValid($value);
    }
}