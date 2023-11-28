<?php

namespace Http\Request;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    private array $errors = [];

    public function __construct(private $attributes)
    {
        if (Validator::email($this->attributes['email'])) {
            $this->errors['email'] = 'please provide a valid email address.';
        }

        if (Validator::string($this->attributes['password'], 5, 255)) {
            $this->errors['password'] = 'password should be at least 5 characters.';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($key, $value)
    {
        $this->errors[$key] = $value;

        return $this;
    }
}