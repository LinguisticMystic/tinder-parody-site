<?php

namespace App\Middlewares;

class CheckLogoutMiddleware implements MiddlewareInterface
{
    public function handle(): void
    {
        if (isset($_SESSION['auth_id'])) {
            header('Location: /dashboard');
        }
    }
}