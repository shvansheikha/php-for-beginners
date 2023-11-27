<?php

namespace Core\Middleware;

class Guest implements MiddlewareContract
{
    public function handle(): void
    {
        if ($_SESSION['user'] ?? false) {
            header('location: /');
            exit();
        }
    }
}