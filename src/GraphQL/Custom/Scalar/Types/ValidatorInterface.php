<?php

/**
 * Interface ValidatorInterface
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
interface ValidatorInterface
{
    /**
     * @param  string $value
     * @return mixed
     */
    public function validateValue($value);

    /**
     * @param  \GraphQL\Language\AST\Node $valueNode
     * @return mixed
     */
    public function validateLiteral($valueNode);
}