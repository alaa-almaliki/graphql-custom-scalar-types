<?php
namespace GraphQL\Custom\Scalar\Types;

/**
 * Class Factory
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class Registry
{
    /**
     * @param  string $type
     * @return \GraphQL\Custom\Scalar\Types\AbstractType
     */
    static private function create($type)
    {
        $class =  __NAMESPACE__ . '\\' . $type;
        return new $class();
    }

    /**
     * @return AbstractType
     */
    static public function emailType()
    {
        return static::create('EmailType');
    }
}