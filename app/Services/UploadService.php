<?php

namespace App\Services;

use App\Models\UploadRequest;
use App\Models\PictureData;
use App\Repositories\PicturesRepository;

class UploadService
{
    public function __construct(PicturesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(UploadRequest $request): void
    {
        $pictureData = new PictureData($request->userID(), $request->originalFileName(), $request->filePath());
        $this->repository->addPicture($pictureData);


        $fileDestination = dirname(__DIR__, 2) . '/storage/files/profile-pictures/' . $request->filePath();

        if (!is_dir(pathinfo($fileDestination)['dirname'])) {
            mkdir(dirname(__DIR__, 2) . '/storage/files/profile-pictures/' . $request->fileDirectory(), 0777, true);
        }

        move_uploaded_file($request->tempName(), $fileDestination);
    }
}