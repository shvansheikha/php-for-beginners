<?php

namespace Request;

use Core\Validator;

class LoginForm
{
    private array $errors = [];

    public function validate($email, $password): bool
    {
        if (Validator::email($email)) {
            $this->errors['email'] = 'please provide a valid email address.';
        }

        if (Validator::string($password, 5, 255)) {
            $this->errors['password'] = 'password should be at least 5 characters.';
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($key, $value): void
    {
        $this->errors[$key] = $value;
    }
}