<?php

namespace App\Controllers;

use App\Services\DeletePictureService;

class DeletePictureController
{
    private DeletePictureService $service;

    public function __construct(DeletePictureService $service)
    {
        $this->service = $service;
    }

    public function delete(): void
    {
        foreach ($_POST['delete'] as $key => $value) {
            if (isset($_POST['delete'][$key])) {
                $this->service->execute($key);
            }
        }

        header('Location: /edit-gallery');
    }
}