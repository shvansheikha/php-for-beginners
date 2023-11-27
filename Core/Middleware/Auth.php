<?php

namespace Core\Middleware;

class Auth implements MiddlewareContract
{
    public function handle(): void
    {
        if (!$_SESSION['user'] ?? false) {
            header('location: /');

            exit();
        }
    }
}