<?php

namespace App\Services;

use App\Repositories\PicturesRepository;

class ListGalleryService
{
    public function __construct(PicturesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $userID): array
    {
        return $this->repository->listUserPictures($userID);
    }
}