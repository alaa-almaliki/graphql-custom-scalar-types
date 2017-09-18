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
     * @param  array $params
     * @return \GraphQL\Custom\Scalar\Types\AbstractType
     */
    private static function create($type, array $params = [])
    {
        $class = __NAMESPACE__ . '\\' . $type;
        /** @var AbstractType $object */
        $object =  new $class();

        if ($object instanceof TypeParamsInterface) {
            $object->setParameters($params);
        }

        return $object;
    }

    /**
     * @return AbstractType
     */
    public static function basicEmailType()
    {
        return static::create('BasicEmailType');
    }

    /**
     * @return AbstractType
     */
    public static function strictEmailType()
    {
        return static::create('StrictEmailType');
    }

    /**
     * @param  string $regionCode
     * @return AbstractType
     */
    public static function phoneNumberType($regionCode = null)
    {
        $params = ['region_code' => $regionCode];
        return static::create('PhoneNumberType', $params);
    }

    /**
     * @return AbstractType
     */
    public static function phoneRegionType()
    {
        return static::create('PhoneRegionType');
    }
}
