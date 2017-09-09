<?php
namespace GraphQL\Custom\Scalar\Types;

use GraphQL\Custom\Scalar\Types\Validation\Email;
use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Utils;
use Symfony\Component\Validator\Validation;

/**
 * Class EmailType
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class EmailType extends AbstractType
{
    /**
     * EmailType constructor.
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
        if (!Email::isValid($value)) {
            //throw new \UnexpectedValueException("Cannot represent value as email: " . Utils::printSafe($value));
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
        if (!Email::isValid($valueNode->value)) {
            throw new Error("Not a valid email", [$valueNode]);
        }

        return $this;
    }
}