<?php

namespace App\Services;

class LogoutService
{
    public function execute(): void
    {
        unset($_SESSION['auth_id']);
        header('Location: /');
    }
}