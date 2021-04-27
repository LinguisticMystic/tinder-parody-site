<?php

namespace App\Controllers;

use App\Models\UploadRequest;
use App\Services\UploadService;
use App\Validators\UploadValidator;

class UploadController
{
    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function upload()
    {
        $validator = new UploadValidator($_FILES);
        $_SESSION['_flash']['errors'] = $validator->validate();

        if (empty($_SESSION['_flash']['errors'])) {

            $request = new UploadRequest(
                $_SESSION['auth_id'],
                $_FILES['file']['type'],
                $_FILES['file']['name'],
                $_FILES['file']['tmp_name']
            );

            $this->uploadService->execute($request);

            header('Location: /edit-gallery');

        } else {
            header('Location: /edit-gallery');
        }
    }
}