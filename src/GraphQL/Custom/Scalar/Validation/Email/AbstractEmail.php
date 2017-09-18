<?php
namespace GraphQL\Custom\Scalar\Validation\Email;

use EmailValidator\Validator;

/**
 * Class AbstractEmail
 * @package GraphQL\Custom\Scalar\Types\Validation\Email
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
abstract class AbstractEmail
{
    /**
     * @param  string $email
     * @return bool
     */
    public function isValid($email)
    {
        return $this->getEmailValidator()->isEmail($email);
    }

    /**
     * @return Validator
     */
    protected function getEmailValidator()
    {
        static $validator = null;
        return $validator ?: ($validator = new Validator());
    }
}
