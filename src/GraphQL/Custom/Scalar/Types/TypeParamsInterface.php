<?php
namespace GraphQL\Custom\Scalar\Types;

/**
 * Interface TypeParamsInterface
 * @package GraphQL\Custom\Scalar\Types
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
interface TypeParamsInterface
{
    /**
     * @param  array $params
     * @return mixed
     */
    public function setParameters(array $params);

    /**
     * @return array
     */
    public function getParameters();

    /**
     * @param  string $parameter
     * @return mixed
     */
    public function getValue($parameter);
}
