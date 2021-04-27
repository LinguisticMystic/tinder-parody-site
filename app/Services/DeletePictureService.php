<?php

namespace App\Services;

use App\Repositories\PicturesRepository;

class DeletePictureService
{
    public function __construct(PicturesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): void
    {
        $this->repository->deletePicture($id);
    }
}