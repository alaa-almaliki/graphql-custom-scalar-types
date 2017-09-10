<?php
namespace GraphQL\Custom\Scalar\Types;

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