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
        $classParts = [
            __NAMESPACE__,
            $type
        ];
        $class = implode('\\', $classParts);
        return new $class();
    }

    /**
     * @return AbstractType
     */
    static public function basicEmailType()
    {
        return static::create('BasicEmailType');
    }

    /**
     * @return AbstractType
     */
    static public function strictEmailType()
    {
        return static::create('StrictEmailType');
    }
}