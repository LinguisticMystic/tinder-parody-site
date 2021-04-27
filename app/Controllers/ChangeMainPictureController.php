<?php

namespace App\Controllers;

use App\Services\ChangeMainPictureService;

class ChangeMainPictureController
{
    private ChangeMainPictureService $service;

    public function __construct(ChangeMainPictureService $service)
    {
        $this->service = $service;
    }

    public function change(): void
    {
        foreach ($_POST['change'] as $key => $value) {
            if (isset($_POST['change'][$key])) {
                $this->service->execute($key);
            }
        }

        header('Location: /edit-gallery');
    }
}