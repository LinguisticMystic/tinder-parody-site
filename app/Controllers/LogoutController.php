<?php

namespace App\Controllers;

use App\Services\LogoutService;

class LogoutController
{
    public function __construct(LogoutService $logoutService)
    {
        $this->logoutService = $logoutService;
    }

    public function logout()
    {
        $this->logoutService->execute();
    }
}