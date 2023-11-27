<?php

namespace Core\Middleware;

interface MiddlewareContract
{
    public function handle(): void;
}