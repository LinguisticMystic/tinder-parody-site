<?php

namespace App\Controllers;

use App\Services\RateService;

class RateController
{
    private RateService $service;

    public function __construct(
        RateService $service
    )
    {
        $this->service = $service;
    }

    public function rate()
    {
        $this->service->execute();

        header('Location: /dashboard');
    }
}