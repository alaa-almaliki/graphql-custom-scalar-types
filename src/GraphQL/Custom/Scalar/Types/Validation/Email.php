<?php
namespace GraphQL\Custom\Scalar\Types\Validation;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

/**
 * Class Email
 * @package GraphQL\Custom\Scalar\Types\Validation
 * @author Alaa Al-Maliki <alaa.almaliki@gmail.com>
 */
class Email
{
    /**
     * @param  string $email
     * @return bool
     */
    static public function isValid($email)
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($email, [
            new Assert\NotBlank(),
            new Assert\Email([
                'message' => $email . ' is not a valid email.',
                'checkMX' => true,
                'strict' => true,
            ])
        ]);

        return 0 === count($violations);
    }
}