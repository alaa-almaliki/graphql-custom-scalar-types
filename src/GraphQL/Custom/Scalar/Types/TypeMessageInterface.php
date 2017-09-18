<?php
namespace GraphQL\Custom\Scalar\Types;

/**
 * Interface TypeMessageInterface
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
interface TypeMessageInterface
{
    /**
     * @return string
     */
    public function getValueErrorMessage();

    /**
     * @return string
     */
    public function getLiteralErrorMessage();
}
