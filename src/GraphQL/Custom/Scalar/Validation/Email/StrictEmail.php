<?php
namespace GraphQL\Custom\Scalar\Validation\Email;

/**
 * Class StrictEmail
 * @package GraphQL\Custom\Scalar\Types\Validation\Email
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class StrictEmail extends AbstractEmail
{
    /**
     * @param string $email
     * @return bool
     */
    public function isValid($email)
    {
        return $this->getEmailValidator()->isValid($email);
    }
}